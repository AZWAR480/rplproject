<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';
    protected $primaryKey = 'id_invoice';

    protected $fillable = [
        'id_barang', 'id_checkout', 'nama_barang', 'jumlah_barang', 'total_harga', 'tgl_pesan'
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_checkout', 'id_checkout');
    }
}
