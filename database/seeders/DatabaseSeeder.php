<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Information;
use App\Models\Kategori;
use App\Models\Diskusi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'nip'   => "1741010248",
            'no_tlp'    => '085741492045',
            'password'  => Hash::make('admin123'),
            'role'  => 'admin'
        ]);

        $kategori = [
            ['nama_kategori' => 'Edukasi', 'slug' => 'edukasi'],
            ['nama_kategori' => 'Penelitian', 'slug' => 'penelitian']
        ];

        foreach ($kategori as $value) {
            Kategori::create($value);
        }

        $information = [
            ['user_id' => '1', 'kategori_id' => '1', 'judul' => 'What is Lorem Ipsum', 'konten'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text'],
            ['user_id' => '1', 'kategori_id' => '2', 'judul' => 'What is Lorem Ipsum', 'konten'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text'],
            ['user_id' => '1', 'kategori_id' => '1', 'judul' => 'What is Lorem Ipsum', 'konten'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text']
        ];

        foreach ($information as $value) {
            Information::create($value);
        }

        $topik = [
            ['id_forum' => rand(100000, 999999), 'judul'  => 'What is Lorem Ipsum', 'konten'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text', 'nama_universitas'  => 'UNIVERSITAS A', 'nim'  => '1741020248', 'nama_mahasiswa'  => 'Mega', 'email'  => 'mega@mail.com'],
            ['id_forum' => rand(100000, 999999), 'judul'  => 'What is Lorem Ipsum', 'konten'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text', 'nama_universitas'  => 'UNIVERSITAS A', 'nim'  => '1741020248', 'nama_mahasiswa'  => 'Mega', 'email'  => 'mega@mail.com'],
            ['id_forum' => rand(100000, 999999), 'judul'  => 'What is Lorem Ipsum', 'konten'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text', 'nama_universitas'  => 'UNIVERSITAS A', 'nim'  => '1741020248', 'nama_mahasiswa'  => 'Mega', 'email'  => 'mega@mail.com']
        ];

        foreach ($topik as $value) {
            Diskusi::create($value);
        }
    }
}

