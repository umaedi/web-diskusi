<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'informasi_id',
        'nama_universitas',
        'nim',
        'nama_mahasiswa',
        'email',
        'komentar'
    ];

    public function topic()
    {
        return $this->belongsTo(Information::class);
    }
}
