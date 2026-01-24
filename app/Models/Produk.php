<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    protected $fillable = [
        'gambar',
        'nama',
        'deskripsi',
        'harga',
        'is_hot'
    ];
}
