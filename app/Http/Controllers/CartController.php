<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart()
    {
        $cart = session('cart', []);

        // Pastikan $cart adalah array sebelum melakukan operasi
        if (!is_array($cart)) {
            $cart = [];
        }

        // Ambil data barang dari basis data berdasarkan $cart
        $barang = collect($cart)->map(function ($item, $key) {
            // Misalnya, jika menggunakan relasi dengan Product
            $product = Product::find($item['id_barang']);

            return (object)[
                'id_barang' => $item['id_barang'],
                'nama_barang' => $item['nama_barang'],
                'harga_barang' => $item['harga_barang'],
                'jumlah' => $item['jumlah'],
                'gambar_barang' => $item['gambar_barang'],
                'deskripsi_barang' => $product ? $product->deskripsi_barang : '', // Cek apakah product ada
                'total' => $item['harga_barang'] * $item['jumlah']
            ];
        });

        // Hitung total harga barang di keranjang
        $total_harga = $barang->sum('total');

        return view('cart', compact('barang', 'total_harga'));
    }

    public function addToCart(Request $request, $id)
    {
        $barang = Product::find($id);

        if (!$barang) {
            return back()->with('error', 'Produk tidak ditemukan.');
        }

        // Ambil data keranjang dari session atau buat array baru jika tidak ada
        $cart = $request->session()->get('cart', []);

        // Jika barang sudah ada di keranjang, tambahkan jumlahnya
        if (isset($cart[$id])) {
            $cart[$id]['jumlah'] += $request->input('jumlah', 1);
        } else {
            // Jika belum ada, tambahkan barang baru ke keranjang
            $cart[$id] = [
                "id_barang" => $barang->id_barang,
                "nama_barang" => $barang->nama_barang,
                "harga_barang" => $barang->harga_barang,
                "jumlah" => $request->input('jumlah', 1),
                "gambar_barang" => $barang->gambar_barang
            ];
        }

        // Simpan kembali ke session
        $request->session()->put('cart', $cart);

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Barang berhasil ditambahkan ke keranjang!');
    }

    public function removeFromCart(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);

        // Pastikan $cart adalah array sebelum melakukan operasi
        if (!is_array($cart)) {
            $cart = [];
        }

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        // Simpan kembali ke session
        $request->session()->put('cart', $cart);

        // Hitung total harga barang di keranjang setelah item dihapus
        $total_harga = collect($cart)->map(function ($item) {
            return $item['harga_barang'] * $item['jumlah'];
        })->sum();

        // Kembalikan total harga yang diperbarui sebagai JSON
        return response()->json([
            'success' => true,
            'total_harga' => number_format($total_harga, 2)
        ]);
    }

    public function update(Request $request)
    {
        $quantities = $request->input('quantities');

        // Ambil data keranjang dari session
        $cart = $request->session()->get('cart', []);

        // Pastikan $cart adalah array sebelum melakukan operasi
        if (!is_array($cart)) {
            $cart = [];
        }

        foreach ($quantities as $id_barang => $jumlah) {
            if (isset($cart[$id_barang])) {
                // Perbarui jumlah barang dalam keranjang
                $cart[$id_barang]['jumlah'] = $jumlah;
            }
        }

        // Simpan kembali ke session
        $request->session()->put('cart', $cart);

        // Ambil data barang dari basis data berdasarkan $cart
        $barang = collect($cart)->map(function ($item) {
            $product = Product::find($item['id_barang']);

            return (object)[
                'id_barang' => $item['id_barang'],
                'nama_barang' => $item['nama_barang'],
                'harga_barang' => $item['harga_barang'],
                'jumlah' => $item['jumlah'],
                'gambar_barang' => $item['gambar_barang'],
                'deskripsi_barang' => $product ? $product->deskripsi_barang : '', // Cek apakah product ada
                'total' => $item['harga_barang'] * $item['jumlah']
            ];
        });

        // Hitung total harga barang di keranjang setelah diupdate
        $total_harga = $barang->sum('total');

        return redirect()->route('cart.show')->with('success', 'Keranjang berhasil diperbarui!');
    }

    public function checkout()
    {
        $cart = session('cart', []);

        // Pastikan $cart adalah array sebelum melakukan operasi
        if (!is_array($cart)) {
            $cart = [];
        }

        // Ambil data barang dari basis data berdasarkan $cart
        $barang = collect($cart)->map(function ($item) {
            return (object)[
                'id_barang' => $item['id_barang'],
                'nama_barang' => $item['nama_barang'],
                'harga_barang' => $item['harga_barang'],
                'jumlah' => $item['jumlah'],
                'gambar_barang' => $item['gambar_barang']
            ];
        });

        return view('checkout', compact('barang'));
    }

    public function submitForm(Request $request)
    {
        // Lakukan proses penyimpanan data pesanan di sini
        // Contoh:
        $data = $request->all();
        // Simpan data ke database atau lakukan tindakan lain sesuai kebutuhan

        // Kosongkan session setelah checkout
        $request->session()->forget('cart');

        return redirect()->route('checkout.showForm')->with('success', 'Checkout berhasil! Terima kasih atas pembelian Anda.');
    }
}
