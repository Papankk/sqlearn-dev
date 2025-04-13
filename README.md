SQLearn
=======

SQLearn adalah platform website yang dibuat untuk mempelajari SQL dengan mengadaptasi konsep seperti bermain game kuis. SQLearn menyediakan berbagai macam kuis berdasarkan tingkatan bab yang sudah disesuaikan. Tidak hanya kuis, SQLearn juga menyediakan materi pembelajaran untuk menunjang pengerjaan kuis oleh pengguna. Dengan SQLearn, pengguna akan dapat mempelajari SQL dengan mudah dan menyenangkan.

Fitur Utama
-----------

*   **Kuis SQL:** Berbagai kuis yang disesuaikan dengan tingkat kesulitan bab SQL.
*   **Materi Pembelajaran:** Menyediakan materi pembelajaran untuk membantu pengguna memahami konsep SQL sebelum mengikuti kuis.
*   **Tingkatan Bab:** Kuis dan materi dibagi berdasarkan tingkatan bab agar sesuai dengan kemampuan pengguna.

Teknologi yang Digunakan
---------

- [Laravel](https://laravel.com/) (v11.x)
- PHP (v8.x)
- MySQL
- Bootstrap
- JavaScript (ApexCharts, ChoicesJS, DropzoneJS, dll)
- Midtrans

Tim Pengembang
---------

- [Muhammad Zulfan](https://github.com/Papankk) – [Project Manager]
- [Nama 2] – [Frontend Developer]
- [Nama 3] – [Fullstack / QA / Project Manager, dll]

### Prasyarat

Sebelum memulai, pastikan Anda sudah menginstal hal berikut:

*   PHP 8.x atau yang lebih baru
*   Composer
*   MySQL atau MariaDB
*   Node.js (untuk mengelola frontend dependencies)
*   Laravel 10.x atau yang lebih baru

### Langkah Instalasi

1.  **Clone repository**  
    Pertama, clone repository ini ke dalam direktori lokal Anda:
    
        git clone https://github.com/username/sqlearn-dev.git
        cd sqllearn
    
2.  **Instalasi dependensi backend (PHP)**  
    Instal dependensi PHP dengan menggunakan Composer:
    
        composer install
    
3.  **Menyiapkan file .env**  
    Salin file .env.example menjadi .env:
    
        cp .env.example .env
    
    Kemudian buka file .env dan sesuaikan konfigurasi database dan pengaturan lainnya sesuai kebutuhan Anda:
    
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=sqlearn-dev
        DB_USERNAME=root
        DB_PASSWORD=
    
4.  **Menjalankan Migrasi Database**  
    Jalankan migrasi untuk menyiapkan struktur database:
    
        php artisan migrate
    
5.  **Instalasi dependensi frontend (JavaScript dan CSS)**  
    Instal dependensi frontend dengan menggunakan npm atau yarn:
    
        npm install
    
6.  **Mengompilasi aset frontend**  
    Setelah menginstal dependensi, kompilasi aset frontend menggunakan perintah berikut:
    
        npm run dev
    
7.  **Menjalankan Server**  
    Setelah semua langkah selesai, jalankan server Laravel menggunakan Artisan:
    
        php artisan serve
    
    Sekarang, Anda dapat mengakses website di [http://127.0.0.1:8000](http://127.0.0.1:8000).

Kontribusi
----------

1.  Fork repository ini.
2.  Buat branch baru untuk perubahan Anda (`git checkout -b feature-fitur`).
3.  Commit perubahan Anda (`git commit -am 'Menambahkan fitur baru'`).
4.  Push ke branch baru (`git push origin feature-fitur`).
5.  Buat pull request untuk review dan penggabungan.

Lisensi
-------

Proyek ini dilisensikan di bawah MIT License - lihat [LICENSE.md](LICENSE.md) untuk detail lebih lanjut.
