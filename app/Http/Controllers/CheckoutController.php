<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Product;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Dompdf\Options;

class CheckoutController extends Controller
{
    public function showForm(Request $request)
    {
        $cartItems = $request->session()->get('cart', []);
        $barang = Product::whereIn('id_barang', array_column($cartItems, 'id_barang'))->get();

        return view('checkout', compact('barang'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:products,id_barang',
            'jumlah' => 'required|integer|min:1',
        ]);

        $id_barang = $request->input('id_barang');
        $jumlah = $request->input('jumlah');

        $cart = $request->session()->get('cart', []);
        $found = false;

        foreach ($cart as &$item) {
            if ($item['id_barang'] == $id_barang) {
                $item['jumlah'] += $jumlah;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $product = Product::findOrFail($id_barang);
            $cart[] = [
                'id_barang' => $id_barang,
                'nama_barang' => $product->nama_barang,
                'harga_barang' => $product->harga_barang,
                'gambar_barang' => $product->gambar_barang,
                'jumlah' => $jumlah,
            ];
        }

        $request->session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Barang berhasil ditambahkan ke keranjang.');
    }

    public function submitForm(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'fname' => 'required',
            'houseadd' => 'required',
            'city' => 'required',
            'province' => 'required',
            'zipcode' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'metode_pembayaran' => 'required',
        ]);

        // Simpan data checkout
        $checkout = new Pesanan();
        $checkout->tgl_pesan = now();
        $checkout->status_pesanan = 'Menunggu Pembayaran';
        $checkout->fname = $validatedData['fname'];
        $checkout->houseadd = $validatedData['houseadd'];
        $checkout->apartment = $request->input('apartment');
        $checkout->city = $validatedData['city'];
        $checkout->province = $validatedData['province'];
        $checkout->zipcode = $validatedData['zipcode'];
        $checkout->phone = $validatedData['phone'];
        $checkout->email = $validatedData['email'];
        $checkout->metode_pembayaran = $validatedData['metode_pembayaran'];
        $checkout->id = Auth::id();
        $checkout->save();

        // Simpan data invoice
        $cart = $request->session()->get('cart', []);
        foreach ($cart as $item) {
            Invoice::create([
                'id_barang' => $item['id_barang'],
                'id_checkout' => $checkout->id_checkout,
                'nama_barang' => $item['nama_barang'],
                'jumlah_barang' => $item['jumlah'],
                'total_harga' => $item['harga_barang'] * $item['jumlah'],
                'tgl_pesan' => now(),
            ]);
        }

        // Redirect ke halaman sukses
        return redirect()->route('checkout.success', ['id_checkout' => $checkout->id_checkout]);
    }


    public function success($id_checkout)
    {
        $checkout = Pesanan::findOrFail($id_checkout);
        return view('success', compact('checkout'));
    }

    public function showInvoice($id_checkout)
    {
        // Ambil data pesanan bersama dengan invoice
        $checkout = Pesanan::with('invoices')->findOrFail($id_checkout);
        return view('invoice', ['checkout' => $checkout]);
    }

    public function downloadInvoice($id_checkout)
    {
        try {
            // Ambil data pesanan bersama dengan invoice
            $checkout = Pesanan::with('invoices')->findOrFail($id_checkout);

            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);
            $options->set('defaultFont', 'Helvetica');

            $dompdf = new Dompdf($options);

            // Render view invoice ke HTML
            $html = view('invoice', ['checkout' => $checkout])->render();

            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            return $dompdf->stream('invoice-' . $id_checkout . '.pdf', ['Attachment' => true]);
        } catch (\Exception $e) {
            \Log::error('Terjadi kesalahan saat download invoice: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat download invoice.');
        }
    }
}
