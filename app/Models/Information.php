<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'kategori_id',
        'judul',
        'deskripsi',
        'konten',
        'img'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
