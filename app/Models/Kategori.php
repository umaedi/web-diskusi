<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kategori',
        'slug'
    ];

    public function information()
    {
        return $this->hasMany(Information::class);
    }

    public function diskusi()
    {
        return $this->hasMany(Diskusi::class);
    }
}
