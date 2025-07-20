<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'checkout';
    protected $primaryKey = 'id_checkout';

    protected $fillable = [
        'id', 'tgl_pesan', 'status_pesanan', 'fname', 'houseadd', 'apartment', 'city', 'province', 'zipcode', 'phone', 'email', 'metode_pembayaran'
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'id_checkout', 'id_checkout');
    }
}

