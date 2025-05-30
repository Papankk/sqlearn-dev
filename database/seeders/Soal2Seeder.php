<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Soal2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('soal')->insert([
            [
                'id_sesi' => 5,
                'tipe' => 'mcq',
                'soal' => 'Apa yang dimaksud dengan database?',
                'opsi' => json_encode(['Struktur utama dalam tabel', 'Kumpulan data yang terorganisir', 'Data untuk satu entitas tertentu', 'Atribut atau properti dari data']),
                'jawaban' => json_encode(['Kumpulan data yang terorganisir']),
            ],
            [
                'id_sesi' => 5,
                'tipe' => 'mcq',
                'soal' => 'Tabel dalam database digunakan untuk apa?',
                'opsi' => json_encode(['Menyimpan kumpulan database', 'Menyimpan data dalam bentuk baris dan kolom', 'Mengorganisasi atribut data', 'Menyimpan data untuk satu objek tertentu']),
                'jawaban' => json_encode(['Menyimpan data dalam bentuk baris dan kolom']),
            ],
            [
                'id_sesi' => 5,
                'tipe' => 'multiple',
                'soal' => 'Apa fungsi utama dari sebuah database?',
                'opsi' => json_encode(['Menyimpan', 'Menghapus', 'Mengorganisir', 'Menambah']),
                'jawaban' => json_encode(['Menyimpan', 'Menghapus', 'Mengorganisir', 'Menambah']),
            ],
            [
                'id_sesi' => 5,
                'tipe' => 'mcq',
                'soal' => 'Apa yang dimaksud dengan baris dalam tabel?',
                'opsi' => json_encode(['Kumpulan data untuk satu entitas tertentu', 'Struktur utama untuk menyimpan data', 'Atribut atau properti dari data', 'Nama dari tabel dalam database']),
                'jawaban' => json_encode(['Kumpulan data untuk satu entitas tertentu']),
            ],
            [
                'id_sesi' => 5,
                'tipe' => 'multiple',
                'soal' => 'Apa perbedaan antara baris dan kolom dalam tabel?',
                'opsi' => json_encode(['Satu entitas', '2 entitas', '3 entitas', 'Beberapa entitas', 'Skrip dari data', 'Atribut dari data', 'Entitas', 'Atribut utama']),
                'jawaban' => json_encode(['Satu entitas', 'Atribut dari data']),
            ],
            [
                'id_sesi' => 5,
                'tipe' => 'mcq',
                'soal' => 'Kolom pada tabel mewakili apa?',
                'opsi' => json_encode(['Atribut atau properti dari data', 'Kumpulan tabel dalam database', 'Struktur utama untuk menyimpan data', 'Data untuk satu entitas tertentu']),
                'jawaban' => json_encode(['Atribut atau properti dari data']),
            ],
            [
                'id_sesi' => 5,
                'tipe' => 'mcq',
                'soal' => "Apa yang termasuk contoh kolom dalam tabel 'Mahasiswa'?",
                'opsi' => json_encode(['Nama, NIM, Alamat', 'Data mahasiswa tertentu', 'Struktur tabel dan baris', 'Organisasi data dalam database']),
                'jawaban' => json_encode(['Nama, NIM, Alamat']),
            ],
            [
                'id_sesi' => 5,
                'tipe' => 'multiple',
                'soal' => 'Sebutkan elemen utama yang membentuk struktur database!',
                'opsi' => json_encode(['Tabel', 'Skrip', 'Folder', 'Kolom', 'Baris', 'Form', 'File', 'Database']),
                'jawaban' => json_encode(['Tabel', 'Kolom', 'Baris', 'Database']),
            ],
            [
                'id_sesi' => 5,
                'tipe' => 'multiple',
                'soal' => 'Jelaskan apa yang dimaksud dengan tabel dalam database!',
                'opsi' => json_encode(['Database', 'Baris', 'Kolom']),
                'jawaban' => json_encode(['Database', 'Baris', 'Kolom']),
            ],
            [
                'id_sesi' => 5,
                'tipe' => 'multiple',
                'soal' => "Berikan contoh atribut (kolom) yang dapat digunakan dalam tabel 'Mahasiswa'!",
                'opsi' => json_encode(['Nama', 'Alamat', 'NIM', 'TGL']),
                'jawaban' => json_encode(['Nama', 'Alamat']),
            ],
            [
                'id_sesi' => 6,
                'tipe' => 'mcq',
                'soal' => 'Apa yang dimaksud dengan database?',
                'opsi' => json_encode(['Struktur utama dalam tabel', 'Kumpulan data yang terorganisir', 'Data untuk satu entitas tertentu', 'Atribut atau properti dari data']),
                'jawaban' => json_encode(['Kumpulan data yang terorganisir']),
            ],
            [
                'id_sesi' => 6,
                'tipe' => 'mcq',
                'soal' => 'Tabel dalam database digunakan untuk apa?',
                'opsi' => json_encode(['Menyimpan kumpulan database', 'Menyimpan data dalam bentuk baris dan kolom', 'Mengorganisasi atribut data', 'Menyimpan data untuk satu objek tertentu']),
                'jawaban' => json_encode(['Menyimpan data dalam bentuk baris dan kolom']),
            ],
            [
                'id_sesi' => 6,
                'tipe' => 'mcq',
                'soal' => 'Apa yang dimaksud dengan database relasional?',
                'opsi' => json_encode(['Berhubungan', 'Terhubung', 'Berkoneksi', 'Terjalin']),
                'jawaban' => json_encode(['Berhubungan']),
            ],
            [
                'id_sesi' => 6,
                'tipe' => 'multiple',
                'soal' => 'Jelaskan apa itu relasi One-to-One!',
                'opsi' => json_encode(['Satu Data', 'Dua Data', 'Tiga Data', 'Empat Data', 'Lima Data', 'Banyak Data']),
                'jawaban' => json_encode(['Satu Data']),
            ],
            [
                'id_sesi' => 6,
                'tipe' => 'mcq',
                'soal' => 'Berikan contoh hubungan One-to-Many!',
                'opsi' => json_encode(['Tabel "penulis" dan "buku"', 'Tabel "pelanggan" dan "transaksi"', 'Tabel "produk" dan "kategori"', 'Tabel "Siswa" dan "Kelas"']),
                'jawaban' => json_encode(['Tabel "penulis" dan "buku"']),
            ],
            [
                'id_sesi' => 6,
                'tipe' => 'mcq',
                'soal' => 'Apa perbedaan relasi Many-to-Many dan One-to-Many?',
                'opsi' => json_encode([
                    'Many-to-Many: satu baris ke satu baris; One-to-Many: satu baris ke banyak baris.',
                    'Many-to-Many: banyak ke banyak; One-to-Many: satu ke banyak.',
                    'Many-to-Many: satu ke banyak; One-to-Many: banyak ke banyak.',
                    'Many-to-Many: banyak ke satu; One-to-Many: satu ke satu.'
                ]),
                'jawaban' => json_encode(['Many-to-Many: banyak ke banyak; One-to-Many: satu ke banyak.']),
            ],
            [
                'id_sesi' => 6,
                'tipe' => 'mcq',
                'soal' => 'Manakah yang merupakan contoh relasi Many-to-Many dalam database?',
                'opsi' => json_encode(['Tabel "KTP" dan tabel "Penduduk"', 'Tabel "Kelas" dan tabel "Siswa"', 'Tabel "Siswa" dan tabel "Mata Kuliah"', 'Tabel "Guru" dan tabel "Sekolah"']),
                'jawaban' => json_encode(['Tabel "Siswa" dan tabel "Mata Kuliah"']),
            ],
            [
                'id_sesi' => 6,
                'tipe' => 'mcq',
                'soal' => 'Jika ada tabel "Guru" dan tabel "Mapel", relasi apa yang mungkin terjadi?',
                'opsi' => json_encode(['One-to-One', 'One-to-Many', 'Many-to-Many', 'Many-to-One']),
                'jawaban' => json_encode(['One-to-Many']),
            ],
            [
                'id_sesi' => 6,
                'tipe' => 'multiple',
                'soal' => 'Mengapa relasi penting dalam MySQL?',
                'opsi' => json_encode(['Tabel', 'Data', 'Skrip', 'Form', 'File', 'Folder']),
                'jawaban' => json_encode(['Data']),
            ],
            [
                'id_sesi' => 6,
                'tipe' => 'mcq',
                'soal' => 'Bagaimana cara mengimplementasikan relasi Many-to-Many di MySQL?',
                'opsi' => json_encode([
                    'Dengan menggabungkan kedua tabel utama.',
                    'Dengan menambahkan primary key di salah satu tabel.',
                    'Dengan membuat tabel penghubung yang berisi foreign key dari kedua tabel utama.',
                    'Dengan menggunakan indeks unik di kedua tabel utama.'
                ]),
                'jawaban' => json_encode(['Dengan membuat tabel penghubung yang berisi foreign key dari kedua tabel utama.']),
            ],
            [
                'id_sesi' => 6,
                'tipe' => 'text',
                'soal' => 'Bagaimana cara merepresentasikan relasi One-to-Many di MySQL?',
                'opsi' => null,
                'jawaban' => json_encode(['Foreign Key']),
            ],
            [
                'id_sesi' => 6,
                'tipe' => 'mcq',
                'soal' => 'Tabel "Proyek" memiliki banyak "Karyawan". Relasi apa yang digunakan, dan bagaimana cara mendefinisikannya?',
                'opsi' => json_encode([
                    'One-to-One; tambahkan foreign key di tabel "Proyek".',
                    'One-to-Many; tambahkan foreign key di tabel "Karyawan".',
                    'Many-to-Many; buat tabel penghubung.',
                    'One-to-Many; tambahkan foreign key di tabel "Proyek".'
                ]),
                'jawaban' => json_encode(['One-to-Many; tambahkan foreign key di tabel "Karyawan".']),
            ],
            [
                'id_sesi' => 7,
                'tipe' => 'mcq',
                'soal' => 'Tipe data INT pada MySQL digunakan untuk menyimpan:',
                'opsi' => json_encode(['Teks pendek', 'Angka bulat', 'Teks panjang', 'Tanggal']),
                'jawaban' => json_encode(['Angka bulat']),
            ],
            [
                'id_sesi' => 7,
                'tipe' => 'mcq',
                'soal' => 'Jika Anda ingin menyimpan teks pendek seperti nama atau alamat, tipe data yang paling sesuai adalah:',
                'opsi' => json_encode(['INT', 'TEXT', 'VARCHAR', 'DATE']),
                'jawaban' => json_encode(['VARCHAR']),
            ],
            [
                'id_sesi' => 7,
                'tipe' => 'multiple',
                'soal' => 'Bagaimana format penyimpanan tanggal dalam tipe data DATE?',
                'opsi' => json_encode(['YYYY', 'MM', 'DD', 'HH', 'SS']),
                'jawaban' => json_encode(['YYYY', 'MM', 'DD']),
            ],
            [
                'id_sesi' => 7,
                'tipe' => 'mcq',
                'soal' => 'Tipe data TEXT digunakan untuk menyimpan:',
                'opsi' => json_encode(['Angka bulat', 'Artikel panjang', 'Angka desimal', 'Data tanggal']),
                'jawaban' => json_encode(['Artikel panjang']),
            ],
            [
                'id_sesi' => 7,
                'tipe' => 'mcq',
                'soal' => 'Manakah dari berikut ini yang termasuk contoh data yang dapat disimpan menggunakan tipe data FLOAT/DOUBLE?',
                'opsi' => json_encode(['10, 200, 1', '"Alamat Rumah"', '10.5, 3.1', '20250101']),
                'jawaban' => json_encode(['10.5, 3.1']),
            ],
            [
                'id_sesi' => 7,
                'tipe' => 'mcq',
                'soal' => 'Untuk menyimpan teks dengan panjang lebih dari batas VARCHAR, tipe data yang digunakan adalah:',
                'opsi' => json_encode(['INT', 'TEXT', 'FLOAT', 'DATE']),
                'jawaban' => json_encode(['TEXT']),
            ],
            [
                'id_sesi' => 7,
                'tipe' => 'multiple',
                'soal' => 'Apa arti dari tipe data VARCHAR(50) dalam database?',
                'opsi' => json_encode(['10 Karakter teks', '50 Karakter teks', '25 Karakter teks', '10 Angka', '25 Angka', '50 Angka']),
                'jawaban' => json_encode(['50 Karakter teks']),
            ],
            [
                'id_sesi' => 7,
                'tipe' => 'mcq',
                'soal' => 'Tipe data apa yang digunakan untuk menyimpan data 20250101?',
                'opsi' => json_encode(['DATE', 'INT', 'VARCHAR', 'FLOAT']),
                'jawaban' => json_encode(['DATE']),
            ],
            [
                'id_sesi' => 7,
                'tipe' => 'mcq',
                'soal' => 'Jika ingin menyimpan angka negatif, tipe data yang paling tepat adalah:',
                'opsi' => json_encode(['FLOAT', 'TEXT', 'VARCHAR', 'INT']),
                'jawaban' => json_encode(['INT']),
            ],
            [
                'id_sesi' => 7,
                'tipe' => 'multiple',
                'soal' => 'Manakah dari berikut ini yang termasuk dalam data MySQL?',
                'opsi' => json_encode(['INT', 'VARCHAR', 'DECIMAL', 'STRING', 'BOOLEAN', 'TEXT', 'FLOAT', 'BINARY']),
                'jawaban' => json_encode(['INT', 'VARCHAR', 'FLOAT']),
            ],
            [
                'id_sesi' => 8,
                'tipe' => 'mcq',
                'soal' => 'Apa sintaks dasar untuk membuat tabel di MySQL?',
                'opsi' => json_encode(['SELECT * FROM nama_tabel;', 'CREATE TABLE nama_tabel….;', 'INSERT INTO nama_tabel…..;', 'DELETE FROM nama_tabel;']),
                'jawaban' => json_encode(['CREATE TABLE nama_tabel….;']),
            ],
            [
                'id_sesi' => 8,
                'tipe' => 'multiple',
                'soal' => 'Apa langkah yang harus dilakukan sebelum membuat tabel di MySQL?',
                'opsi' => json_encode(['Memilih', 'Membuat', 'Menghapus', 'CREATE', 'SHOW', 'CHOOSE']),
                'jawaban' => json_encode(['Memilih']),
            ],
            [
                'id_sesi' => 8,
                'tipe' => 'mcq',
                'soal' => 'Apa tipe data yang cocok untuk menyimpan nama di tabel MySQL?',
                'opsi' => json_encode(['TEXT', 'DATE', 'VARCHAR', 'NT']),
                'jawaban' => json_encode(['VARCHAR']),
            ],
            [
                'id_sesi' => 8,
                'tipe' => 'mcq',
                'soal' => 'Kolom apa yang biasanya digunakan sebagai kunci utama?',
                'opsi' => json_encode(['PRIMARY KEY', 'FOREIGN KEY', 'AUTO_INCREMENT', 'VARCHAR']),
                'jawaban' => json_encode(['PRIMARY KEY']),
            ],
            [
                'id_sesi' => 8,
                'tipe' => 'multiple',
                'soal' => 'Apa fungsi AUTO_INCREMENT dalam tabel MySQL?',
                'opsi' => json_encode(['Data Pasti', 'Data Unik', 'Data Terbaru', 'Otomatis', 'Manual', 'AI']),
                'jawaban' => json_encode(['Data Unik', 'Otomatis']),
            ],
            [
                'id_sesi' => 8,
                'tipe' => 'text',
                'soal' => 'Apa fungsi PRIMARY KEY dalam tabel MySQL?',
                'opsi' => null,
                'jawaban' => json_encode(['Nilai Unik']),
            ],
            [
                'id_sesi' => 8,
                'tipe' => 'text',
                'soal' => 'Apa tipe data yang cocok untuk menyimpan nama dalam tabel MySQL?',
                'opsi' => null,
                'jawaban' => json_encode(['VARCHAR']),
            ],
            [
                'id_sesi' => 8,
                'tipe' => 'text',
                'soal' => 'Bagaimana cara memilih database yang akan digunakan sebelum membuat tabel?',
                'opsi' => null,
                'jawaban' => json_encode(['USE']),
            ],
            [
                'id_sesi' => 8,
                'tipe' => 'multiple',
                'soal' => 'Apa tujuan menggunakan perintah CREATE DATABASE?',
                'opsi' => json_encode(['Membuat', 'Menyalin', 'Menghapus', 'Memakai']),
                'jawaban' => json_encode(['Membuat']),
            ],
            [
                'id_sesi' => 8,
                'tipe' => 'mcq',
                'soal' => 'Apa fungsi dari AUTO_INCREMENT dalam sebuah tabel?',
                'opsi' => json_encode(['Mengatur kolom menjadi kunci utama', 'Menambahkan nilai secara otomatis', 'Menghapus data pada kolom', 'Mengubah tipe data kolom']),
                'jawaban' => json_encode(['Menambahkan nilai secara otomatis']),
            ],
            [
                'id_sesi' => 9,
                'tipe' => 'text',
                'soal' => 'Bagaimana cara membuat database baru dengan nama "perpustakaan"?',
                'opsi' => null,
                'jawaban' => json_encode(['CREATE']),
            ],
            [
                'id_sesi' => 9,
                'tipe' => 'text',
                'soal' => 'Bagaimana cara melihat semua tabel yang ada dalam sebuah database?',
                'opsi' => null,
                'jawaban' => json_encode(['SHOW']),
            ],
            [
                'id_sesi' => 9,
                'tipe' => 'text',
                'soal' => 'Bagaimana cara menghapus database dengan nama "inventory"?',
                'opsi' => null,
                'jawaban' => json_encode(['DROP DATABASE']),
            ],
            [
                'id_sesi' => 9,
                'tipe' => 'text',
                'soal' => 'Bagaimana cara menghapus tabel bernama "pelanggan"?',
                'opsi' => null,
                'jawaban' => json_encode(['DROP TABLE']),
            ],
            [
                'id_sesi' => 9,
                'tipe' => 'mcq',
                'soal' => 'Bagaimana cara menampilkan struktur tabel bernama "pegawai"?',
                'opsi' => json_encode(['DESCRIBE pegawai;', 'DROP TABLE pegawai;', 'CREATE TABLE pegawai;', 'USE pegawai;']),
                'jawaban' => json_encode(['DESCRIBE pegawai;']),
            ],
            [
                'id_sesi' => 9,
                'tipe' => 'text',
                'soal' => 'Bagaimana cara memilih database bernama "universitas" agar dapat digunakan?',
                'opsi' => null,
                'jawaban' => json_encode(['USE']),
            ],
            [
                'id_sesi' => 9,
                'tipe' => 'mcq',
                'soal' => 'Apa yang terjadi jika kita menjalankan perintah DROP DATABASE sekolah?',
                'opsi' => json_encode(['Menghapus', 'Mengunduh', 'Menyalin', 'Menonaktifkan']),
                'jawaban' => json_encode(['Menghapus']),
            ],
            [
                'id_sesi' => 9,
                'tipe' => 'mcq',
                'soal' => 'Bagaimana cara mengubah nama sebuah tabel?',
                'opsi' => json_encode(['Rename Table', 'Change Name Table', 'Rewrite Table', 'Edit Table']),
                'jawaban' => json_encode(['Rename Table']),
            ],
            [
                'id_sesi' => 9,
                'tipe' => 'mcq',
                'soal' => 'Bagaimana cara menampilkan struktur tabel "produk"?',
                'opsi' => json_encode(['DESCRIBE produk;', 'CREATE TABLE produk;', 'DROP DATABASE produk;', 'USE produk;']),
                'jawaban' => json_encode(['DESCRIBE produk;']),
            ],
            [
                'id_sesi' => 9,
                'tipe' => 'mcq',
                'soal' => 'Jika Anda ingin memastikan bahwa Anda sedang bekerja di database "penjualan", perintah apa yang harus dijalankan?',
                'opsi' => json_encode(['SHOW', 'USE', 'DESCRIBE', 'CREATE']),
                'jawaban' => json_encode(['USE']),
            ],
        ]);
    }
}
