<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testimony extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'harga',
        'jenis',
        'gambar',
        'spesial',
        'deskripsi'
    ];
}
