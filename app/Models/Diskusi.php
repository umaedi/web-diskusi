<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskusi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_kategori',
        'id_forum',
        'judul',
        'konten',
        'nama_universitas', 
        'nim',
        'nama_mahasiswa',
        'email',
        'img',
        'view'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
