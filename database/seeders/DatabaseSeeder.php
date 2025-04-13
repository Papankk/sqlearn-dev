<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BabSeeder::class,
            SesiSeeder::class,
            Soal1Seeder::class,
            Soal2Seeder::class,
            Soal3Seeder::class,
            Soal4Seeder::class,
            MateriSeeder::class,
        ]);
    }
}
