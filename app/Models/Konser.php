<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Konser extends Model
{
    protected $fillable = [
        'nama', 'poster', 'tanggal', 'waktu', 'lokasi', 'deskripsi', 'link_tiket'
    ];

    protected $table = 'konser';
    protected $guarded = ['id'];
}
