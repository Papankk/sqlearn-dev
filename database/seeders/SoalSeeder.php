<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('soal')->insert([
            [
                'id_sesi' => 1,
                'tipe' => 'text',
                'soal' => 'Apa itu MySQL?',
                'opsi' => null,
                'jawaban' => json_encode(['sistem manajemen basis data relasional']),
            ],
            [
                'id_sesi' => 1,
                'tipe' => 'mcq',
                'soal' => 'MySQL pertama kali dibuat pada tahun?',
                'opsi' => json_encode(['1990', '1995', '2001', '1987']),
                'jawaban' => json_encode(['1995']),
            ],
            [
                'id_sesi' => 1,
                'tipe' => 'mcq',
                'soal' => 'Apa tujuan utama MySQL?',
                'opsi' => json_encode(['Mengelola Database', 'Menghosting server', 'Mengatur Sistem Operasi', 'Sebagai Compiler']),
                'jawaban' => json_encode(['Mengelola Database']),
            ],
            [
                'id_sesi' => 1,
                'tipe' => 'mcq',
                'soal' => 'Siapa yang mengakuisisi MySQL pada tahun 2008?',
                'opsi' => json_encode(['Sun Microsystem', 'ByteDance', 'Oracle', 'Google']),
                'jawaban' => json_encode(['Sun Microsystem']),
            ],
            [
                'id_sesi' => 1,
                'tipe' => 'text',
                'soal' => 'Apa yang terjadi dengan MySQL setelah diakuisisi oleh Sun Microsystems?',
                'opsi' => null,
                'jawaban' => json_encode(['Oracle']),
            ],
            [
                'id_sesi' => 1,
                'tipe' => 'mcq',
                'soal' => 'Bahasa apa yang digunakan MySQL untuk berinteraksi dengan data?',
                'opsi' => json_encode(['SQL', 'PHP', 'C++', 'Java']),
                'jawaban' => json_encode(['SQL']),
            ],
            [
                'id_sesi' => 1,
                'tipe' => 'multiple_ordered',
                'soal' => 'Apa saja operasi dasar yang dapat dilakukan dengan SQL di MySQL?',
                'opsi' => json_encode(['Membuat', 'Membaca', 'Memperbarui', 'Menghapus', 'Membeli', 'Membayar', 'Mengedit']),
                'jawaban' => json_encode(['Membuat', 'Membaca', 'Memperbarui', 'Menghapus']),
            ],
            [
                'id_sesi' => 1,
                'tipe' => 'mcq',
                'soal' => 'Apakah MySQL populer di kalangan pengembang dan perusahaan karena cepat, mudah, dan andal?',
                'opsi' => json_encode(['Benar', 'Salah']),
                'jawaban' => json_encode(['Benar']),
            ],
            [
                'id_sesi' => 1,
                'tipe' => 'mcq',
                'soal' => 'Sebutkan beberapa perusahaan besar yang menggunakan MySQL.',
                'opsi' => json_encode(['Twitch, Youtube, Twitter', 'Facebook, Twitter, YouTube', 'Discord, Google, Spotify', 'Youtube, Instagram, Microsoft']),
                'jawaban' => json_encode(['Facebook, Twitter, YouTube']),
            ],
            [
                'id_sesi' => 1,
                'tipe' => 'mcq',
                'soal' => 'Apa peran Oracle Corporation dalam pengembangan MySQL saat ini?',
                'opsi' => json_encode(['Mengelola dan Mengembangkan MySQL', 'Menghentikan Pengembangan', 'Menggunakan MySQL Untuk Kebutuhan Internal', 'Mengalihkan Pengembangan ke Komunitas Open Source']),
                'jawaban' => json_encode(['Mengelola dan Mengembangkan MySQL']),
            ],
        ]);
    }
}
