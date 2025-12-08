<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    
    protected $fillable = [
        'order_id', 'konser_id', 'nama', 'email', 'jumlah', 'kelas', 'total_bayar', 'status'
    ];
}
