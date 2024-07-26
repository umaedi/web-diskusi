<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;
    protected $fillable = [
        'diskusi_id',
        'nama_universitas',
        'nim',
        'nama_mahasiswa',
        'email',
        'komentar'
    ];
}
