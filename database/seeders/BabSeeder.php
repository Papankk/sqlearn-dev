<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bab')->insert([
            ['nama_bab' => 'Pengenalan MySQL', 'slug' => 'pengenalan-mysql', 'gambar_bab' => 'assets/images/media/media-45.jpg', 'header' => 'Pengenalan MySQL', 'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus accusantium, repellendus sapiente cumque quos veniam.', 'created_at' => now(), 'updated_at' => now()],
            ['nama_bab' => 'Dasar-Dasar MySQL', 'slug' => 'dasar-dasar-mysql', 'gambar_bab' => 'assets/images/media/media-45.jpg', 'header' => 'Dasar-Dasar MySQL', 'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus accusantium, repellendus sapiente cumque quos veniam.', 'created_at' => now(), 'updated_at' => now()],
            ['nama_bab' => 'Manipulasi Data', 'slug' => 'manipulasi-data', 'gambar_bab' => 'assets/images/media/media-45.jpg', 'header' => 'Manipulasi Data', 'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus accusantium, repellendus sapiente cumque quos veniam.', 'created_at' => now(), 'updated_at' => now()],
            ['nama_bab' => 'Query Lanjutan', 'slug' => 'query-lanjutan', 'gambar_bab' => 'assets/images/media/media-45.jpg', 'header' => 'Query Lanjutan', 'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus accusantium, repellendus sapiente cumque quos veniam.', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
