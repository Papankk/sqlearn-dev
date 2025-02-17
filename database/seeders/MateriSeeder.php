<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materi')->insert([
            ['id_bab' => '1', 'judul_materi' => 'Pengenalan MySQL', 'slug' => 'pengenalan-mysql', 'path' => 'files/Bab 1 Materi Pengenalan MySQL.pdf', 'created_at' => now(), 'updated_at' => now()],
            ['id_bab' => '2', 'judul_materi' => 'Dasar-Dasar MySQL', 'slug' => 'dasar-dasar-mysql', 'path' => 'files/Bab 2 Materi Dasar Dasar MySQL.pdf', 'created_at' => now(), 'updated_at' => now()],
            ['id_bab' => '3', 'judul_materi' => 'Manipulasi Data', 'slug' => 'manipulasi-data', 'path' => 'files/Bab 3 Materi Manipulasi Data.pdf', 'created_at' => now(), 'updated_at' => now()],
            ['id_bab' => '4', 'judul_materi' => 'Query Lanjutan', 'slug' => 'query-lanjutan', 'path' => 'files/Bab 4 Materi Query Lanjutan.pdf', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
