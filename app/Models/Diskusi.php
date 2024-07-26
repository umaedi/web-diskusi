<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskusi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_forum',
        'judul',
        'konten',
        'nama_universitas', 
        'nim',
        'nama_mahasiswa',
        'email',
        'img'
    ];
}
