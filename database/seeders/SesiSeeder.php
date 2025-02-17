<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SesiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sesi')->insert([
            ['id_bab' => '1', 'nama_sesi' => 'Sesi 1', 'header' => 'Sesi 1', 'created_at' => now(), 'updated_at' => now()],
            ['id_bab' => '1', 'nama_sesi' => 'Sesi 2', 'header' => 'Sesi 2', 'created_at' => now(), 'updated_at' => now()],
            ['id_bab' => '1', 'nama_sesi' => 'Sesi 3', 'header' => 'Sesi 3', 'created_at' => now(), 'updated_at' => now()],
            ['id_bab' => '1', 'nama_sesi' => 'Sesi 4', 'header' => 'Sesi 4', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
