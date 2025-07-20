<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Menampilkan dashboard admin
    public function admin()
    {
        return view('admin.dashboard');
    }

    // Menampilkan daftar customer
    public function customers()
    {
        $customers = User::all();
        return view('admin.customer.customers', compact('customers'));
    }

    // Menyimpan customer baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'alamat' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'address' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.customers')
                         ->with('success', 'Customer berhasil ditambahkan.');
    }

    // Menampilkan formulir edit customer
    public function edit($id)
    {
        $customer = User::findOrFail($id);
        return view('admin.customer.edit', compact('customer'));
    }

    // Memperbarui customer
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'alamat' => 'required|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $customer = User::findOrFail($id);
        $customer->nama = $request->nama;
        $customer->email = $request->email;
        $customer->alamat = $request->alamat;

        if ($request->password) {
            $customer->password = Hash::make($request->password);
        }

        $customer->save();

        return redirect()->route('admin.customers')
                         ->with('success', 'Customer berhasil diperbarui.');
    }

    // Menghapus customer
    public function destroy($id)
    {
        $customer = User::findOrFail($id);
        $customer->delete();

        return redirect()->route('admin.customers')
                         ->with('success', 'Customer berhasil dihapus.');
    }

    // Menampilkan daftar produk
    public function products()
    {
        $products = Product::all();
        return view('admin.produk.products', compact('products'));
    }

    // Menampilkan formulir untuk menambahkan produk baru
    public function createProduct()
    {
        return view('admin.produk.create');
    }

    // Menyimpan produk baru
    public function storeProduct(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori_barang' => 'required|string|max:255',
            'deskripsi_barang' => 'required|string|max:255',
            'spesifikasi_barang' => 'required|string',
            'harga_barang' => 'required|numeric',
        ]);

        Product::create([
            'nama_barang' => $request->nama_barang,
            'kategori_barang' => $request->kategori_barang,
            'deskripsi_barang' => $request->deskripsi_barang,
            'spesifikasi_barang' => $request->spesifikasi_barang,
            'harga_barang' => $request->harga_barang,
        ]);

        return redirect()->route('admin.products')
                         ->with('success', 'Produk berhasil ditambahkan.');
    }

    // Menampilkan formulir untuk mengedit produk
    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.produk.edit', compact('product'));
    }

    // Memperbarui produk
public function updateProduct(Request $request, $id)
{
    $request->validate([
        'nama_barang' => 'required|string|max:255',
        'kategori_barang' => 'required|string|max:255',
        'deskripsi_barang' => 'required|string|max:255',
        'spesifikasi_barang' => 'required|string',
        'harga_barang' => 'required|numeric',
    ]);

    $product = Product::findOrFail($id);
    $product->nama_barang = $request->nama_barang;
    $product->kategori_barang = $request->kategori_barang;
    $product->deskripsi_barang = $request->deskripsi_barang;
    $product->spesifikasi_barang = $request->spesifikasi_barang;
    $product->harga_barang = $request->harga_barang;

    $product->save();

    return redirect()->route('admin.products')
                     ->with('success', 'Produk berhasil diperbarui.');
}

    // Menghapus produk
    public function destroyProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products')
                         ->with('success', 'Produk berhasil dihapus.');
    }

    // Menampilkan daftar pesanan
    public function orders()
    {
        // Ambil semua pesanan beserta invoice-nya
        $orders = Pesanan::with('invoices')->get();

        return view('admin.order.orders', compact('orders'));
    }

    public function showOrder($id)
    {
        // Tampilkan detail invoice untuk pesanan tertentu
        $order = Pesanan::with('invoices')->findOrFail($id);

        return view('admin.order.order-details', compact('order'));
    }

    public function destroyOrder($id)
    {
        // Hapus pesanan dan terkait invoice
        $order = Pesanan::findOrFail($id);
        $order->invoices()->delete(); // Hapus semua invoice terkait
        $order->delete();

        return redirect()->route('admin.orders')->with('success', 'Order deleted successfully.');
    }
}
