<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Soal1Seeder extends Seeder
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
                'tipe' => 'multiple',
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
            [
                'id_sesi' => 2,
                'tipe' => 'text',
                'soal' => 'Apa salah satu keunggulan utama MySQL?',
                'opsi' => null,
                'jawaban' => json_encode(['sumber terbuka']),
            ],
            [
                'id_sesi' => 2,
                'tipe' => 'mcq',
                'soal' => 'Sistem operasi apa saja yang didukung MySQL?',
                'opsi' => json_encode(['Hanya Windows', 'Hanya Linux', 'Hanya macOS', 'Semuanya Benar']),
                'jawaban' => json_encode(['Semuanya Benar']),
            ],
            [
                'id_sesi' => 2,
                'tipe' => 'text',
                'soal' => 'MySQL kurang cocok untuk menangani query kompleks dibandingkan dengan PostgreSQL',
                'opsi' => null,
                'jawaban' => json_encode(['Benar']),
            ],
            [
                'id_sesi' => 2,
                'tipe' => 'mcq',
                'soal' => 'Mengapa MySQL dianggap memiliki performa tinggi?',
                'opsi' => json_encode([
                    'Karena desainnya untuk menangani query besar dengan cepat',
                    'Karena hanya mendukung database kecil',
                    'Karena tidak memiliki fitur keamanan',
                    'Karena hanya bekerja di Linux'
                ]),
                'jawaban' => json_encode(['Karena desainnya untuk menangani query besar dengan cepat']),
            ],
            [
                'id_sesi' => 2,
                'tipe' => 'text',
                'soal' => 'Fitur keamanan apa yang ditawarkan oleh MySQL?',
                'opsi' => null,
                'jawaban' => json_encode(['Kontrol akses', 'autentikasi berbasis user']),
            ],
            [
                'id_sesi' => 2,
                'tipe' => 'multiple',
                'soal' => 'Sebutkan dua keunggulan utama MySQL!',
                'opsi' => json_encode(['Sumber Terbuka', 'Tidak Mendukung Linux', 'Kompabilitas Luas', 'Tidak Cocok untuk Query Kompleks']),
                'jawaban' => json_encode(['Sumber Terbuka', 'Kompabilitas Luas']),
            ],
            [
                'id_sesi' => 2,
                'tipe' => 'text',
                'soal' => 'Apa kelemahan MySQL untuk kebutuhan database berskala besar?',
                'opsi' => null,
                'jawaban' => json_encode(['masalah skabilitas']),
            ],
            [
                'id_sesi' => 2,
                'tipe' => 'mcq',
                'soal' => 'Apa keuntungan utama dari komunitas aktif MySQL?',
                'opsi' => json_encode([
                    'Dukungan untuk query kompleks',
                    'Membantu pengguna menemukan dokumentasi, tutorial, atau dukungan dengan mudah',
                    'Memberikan enkripsi otomatis untuk semua data',
                    'Menyediakan fitur berbayar secara gratis'
                ]),
                'jawaban' => json_encode(['Membantu pengguna menemukan dokumentasi, tutorial, atau dukungan dengan mudah']),
            ],
            [
                'id_sesi' => 2,
                'tipe' => 'mcq',
                'soal' => 'Fitur MySQL apa yang terbatas pada versi gratisnya?',
                'opsi' => json_encode([
                    'Autentikasi berbasis user',
                    'Beberapa fitur enterprise untuk keamanan dan audit',
                    'Kontrol akses',
                    'Dukungan untuk Windows'
                ]),
                'jawaban' => json_encode(['Beberapa fitur enterprise untuk keamanan dan audit']),
            ],
            [
                'id_sesi' => 2,
                'tipe' => 'mcq',
                'soal' => 'Mengapa MySQL kurang fleksibel untuk analisis data yang kompleks?',
                'opsi' => json_encode([
                    'Tidak kompatibel dengan Linux',
                    'Tidak mendukung autentikasi user',
                    'Kurang mendukung query kompleks dibandingkan RDBMS lain seperti PostgreSQL',
                    'Tidak memiliki fitur keamanan'
                ]),
                'jawaban' => json_encode(['Kurang mendukung query kompleks dibandingkan RDBMS lain seperti PostgreSQL']),
            ],
            [
                'id_sesi' => 3,
                'tipe' => 'mcq',
                'soal' => 'Apa situs resmi untuk mengunduh installer MySQL?',
                'opsi' => json_encode(['https://mysql.com/', 'https://dev.mysql.com/', 'https://mysql.org/', 'https://install.mysql.com/']),
                'jawaban' => json_encode(['https://dev.mysql.com/']),
            ],
            [
                'id_sesi' => 3,
                'tipe' => 'text',
                'soal' => 'Pada sistem operasi Windows, jenis setup apa yang dapat dipilih selama instalasi MySQL?',
                'opsi' => null,
                'jawaban' => json_encode(['Default', 'Custom']),
            ],
            [
                'id_sesi' => 3,
                'tipe' => 'mcq',
                'soal' => 'Setelah selesai menginstal MySQL di macOS, di mana kita dapat mengaktifkan MySQL?',
                'opsi' => json_encode(['Dari Panel Kontrol MySQL', 'Dari Terminal Menggunakan Perintah mysql start', 'Dari Aplikasi Finder', 'Dari Browser dengan Membuka localhost:3306']),
                'jawaban' => json_encode(['Dari Panel Kontrol MySQL']),
            ],
            [
                'id_sesi' => 3,
                'tipe' => 'text',
                'soal' => 'Perintah apa yang digunakan untuk memperbarui repositori sebelum menginstal MySQL di Ubuntu/Debian?',
                'opsi' => null,
                'jawaban' => json_encode(['sudo apt update']),
            ],
            [
                'id_sesi' => 3,
                'tipe' => 'mcq',
                'soal' => 'Apa tujuan dari perintah `sudo mysql_secure_installation` di Ubuntu/Debian?',
                'opsi' => json_encode(['Menghapus MySQL dari Sistem', 'Menginstall MySQL Secara Otomatis', 'Mengamankan Instalasi MySQL', 'Mempebarui Versi MySQL']),
                'jawaban' => json_encode(['Mengamankan Instalasi MySQL']),
            ],
            [
                'id_sesi' => 3,
                'tipe' => 'text',
                'soal' => 'Apa perintah untuk memulai layanan MySQL pada sistem operasi CentOS/Red Hat?',
                'opsi' => null,
                'jawaban' => json_encode(['sudo systemctl start mysqld']),
            ],
            [
                'id_sesi' => 3,
                'tipe' => 'mcq',
                'soal' => 'Apa format file installer MySQL untuk macOS yang diunduh dari situs resmi?',
                'opsi' => json_encode(['DMG', 'DAT', 'TPS', 'DLL']),
                'jawaban' => json_encode(['DMG']),
            ],
            [
                'id_sesi' => 3,
                'tipe' => 'text',
                'soal' => 'Pada sistem Linux berbasis Ubuntu, paket apa yang diinstal untuk MySQL?',
                'opsi' => null,
                'jawaban' => json_encode(['mysql-installer']),
            ],
            [
                'id_sesi' => 3,
                'tipe' => 'text',
                'soal' => 'Apa langkah pertama dalam menginstal MySQL di Windows setelah mengunduh installer?',
                'opsi' => null,
                'jawaban' => json_encode(['menjalankan installer MySQL']),
            ],
            [
                'id_sesi' => 3,
                'tipe' => 'mcq',
                'soal' => 'Bagaimana cara memulai atau menghentikan server MySQL di macOS menggunakan Terminal?',
                'opsi' => json_encode(['mysql.server begin', 'mysql.start', 'mysql.server start', 'start.mysql']),
                'jawaban' => json_encode(['mysql.server start']),
            ],
            [
                'id_sesi' => 4,
                'tipe' => 'text',
                'soal' => 'Apa itu MySQL Workbench?',
                'opsi' => null,
                'jawaban' => json_encode(['GUI']),
            ],
            [
                'id_sesi' => 4,
                'tipe' => 'mcq',
                'soal' => 'Sebutkan fitur utama MySQL Workbench! (Pilih Jawaban sampai dengan 2)',
                'opsi' => json_encode(['Membuat dan mengelola skema database.', 'Visualisasi hubungan antar tabel.', 'Membuat desain antarmuka aplikasi', 'Menjalankan server web secara langsung']),
                'jawaban' => json_encode(['Membuat dan mengelola skema database.', 'Visualisasi hubungan antar tabel.']),
            ],
            [
                'id_sesi' => 4,
                'tipe' => 'mcq',
                'soal' => 'Apa kelebihan MySQL Workbench?',
                'opsi' => json_encode(['Ramah pengguna', 'Fitur yang Banyak', 'Visual yang menarik', 'Ramah Penyimpanan']),
                'jawaban' => json_encode(['Ramah pengguna', 'Fitur yang Banyak']),
            ],
            [
                'id_sesi' => 4,
                'tipe' => 'text',
                'soal' => 'Pada sistem operasi apa saja MySQL Workbench dapat diinstal?',
                'opsi' => null,
                'jawaban' => json_encode(['Windows', 'macOS', 'Linux']),
            ],
            [
                'id_sesi' => 4,
                'tipe' => 'mcq',
                'soal' => 'Apa itu phpMyAdmin?',
                'opsi' => json_encode(['Alat berbasis GUI resmi dari MySQL untuk desain database', 'Alat berbasis terminal untuk mengelola MySQL', 'Alat berbasis web untuk mengelola MySQL menggunakan Browser', 'Alat untuk menjalankan server database secara langsung']),
                'jawaban' => json_encode(['Alat berbasis web untuk mengelola MySQL menggunakan Browser']),
            ],
            [
                'id_sesi' => 4,
                'tipe' => 'mcq',
                'soal' => 'Sebutkan dua fitur utama phpMyAdmin!',
                'opsi' => json_encode(['Eksekusi query SQL secara visual.', 'Membuat desain antarmuka website', 'Backup dan restore database.', 'Menjalankan server MySQL secara otomatis']),
                'jawaban' => json_encode(['Eksekusi query SQL secara visual.', 'Backup dan restore database.']),
            ],
            [
                'id_sesi' => 4,
                'tipe' => 'mcq',
                'soal' => 'Apa kelebihan phpMyAdmin?',
                'opsi' => json_encode(['Kompleks dan sulit digunakan', 'Mudah digunakan dan populer di kalangan developer web', 'Memungkinkan manajemen server tanpa browser', 'Hanya tersedia untuk pengguna Linux']),
                'jawaban' => json_encode(['Mudah digunakan dan populer di kalangan developer web']),
            ],
            [
                'id_sesi' => 4,
                'tipe' => 'mcq',
                'soal' => 'Apa itu Command Line Interface (CLI) MySQL?',
                'opsi' => json_encode(['Alat GUI untuk mengelola MySQL', 'Alat untuk interaksi MySQL lewat terminal', 'Alat untuk desain antarmuka database', 'Alat untuk menjalankan server MySQL']),
                'jawaban' => json_encode(['Alat untuk interaksi MySQL lewat terminal']),
            ],
            [
                'id_sesi' => 4,
                'tipe' => 'mcq',
                'soal' => 'Sebutkan dua fitur utama CLI untuk MySQL!',
                'opsi' => json_encode(['Eksekusi query SQL langsung.', 'Skrip otomatisasi untuk tugas-tugas tertentu.', 'Membuat desain antarmuka database', 'Menjalankan server MySQL secara otomatis']),
                'jawaban' => json_encode(['Eksekusi query SQL langsung.', 'Skrip otomatisasi untuk tugas-tugas tertentu.']),
            ],
            [
                'id_sesi' => 4,
                'tipe' => 'text',
                'soal' => 'Bagaimana cara mengakses MySQL melalui CLI?',
                'opsi' => null,
                'jawaban' => json_encode(['mysql -u root -p']),
            ],
        ]);
    }
}
