<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Import model Product

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->input('kategori');

        // Mengambil barang berdasarkan kategori jika ada
        if ($kategori) {
            $barang = Product::where('kategori_barang', $kategori)->orderBy('id_barang', 'asc')->get();
        } else {
            // Mengambil semua barang jika kategori tidak ditentukan
            $barang = Product::orderBy('id_barang', 'asc')->get();
        }

        // Mengirim data ke view
        return view('dashboard', ['barang' => $barang]);
    }

    public function search(Request $request)
    {
        $kata_kunci = $request->input('search');
        $barang = Product::where('nama_barang', 'like', '%' . $kata_kunci . '%')
            ->orWhere('deskripsi_barang', 'like', '%' . $kata_kunci . '%')
            ->get();

        return view('dashboard', ['barang' => $barang]);
    }

    public function beliBarang($id_barang)
    {
        $barang = Product::find($id_barang);
        session()->push('keranjang', $barang);
        return redirect()->route('checkout.showForm');
    }

        // Metode untuk halaman About
        public function about()
        {
            return view('about');
        }

        // Metode untuk halaman Contact
        public function contact()
        {
            return view('contact');
        }
}

