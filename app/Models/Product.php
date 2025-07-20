<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $table = 'barang'; // Nama tabel di database

    protected $primaryKey = 'id_barang';
    public $timestamps = false; // Menonaktifkan timestamps

    protected $fillable = [
        'nama_barang', 'deskripsi_barang', 'harga_barang',
        'gambar_barang', 'kategori_barang', 'spesifikasi_barang',
        'harga_barang'
    ];
    protected $guarded = [];
}
