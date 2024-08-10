<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('diskusis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kategori');
            $table->string('id_forum');
            $table->string('judul');
            $table->text('konten');
            $table->string('nama_universitas');
            $table->string('nim');
            $table->string('nama_mahasiswa');
            $table->string('email');
            $table->string('img')->default('forum/forum.jpg');
            $table->string('view')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diskusis');
    }
};
