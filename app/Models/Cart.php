<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'detail_pesanan'; // Nama tabel yang digunakan untuk model Cart

    protected $fillable = [
        'id', // ID pengguna yang memiliki cart
        'id_barang', // ID produk yang ada di cart
        'jumlah_barang', // Jumlah produk dalam cart
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    // Relasi dengan model Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_barang');
    }

    // Nonaktifkan timestamps karena tabel detail_pesanan mungkin tidak memiliki timestamps
    public $timestamps = false;
}
