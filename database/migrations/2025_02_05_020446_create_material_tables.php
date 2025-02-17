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

        Schema::create('bab', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bab');
            $table->string('slug');
            $table->string('gambar_bab');
            $table->string('header');
            $table->string('deskripsi');
            $table->timestamps();
        });

        Schema::create('materi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_bab')->constrained('bab')->onDelete('cascade');
            $table->string('judul_materi');
            $table->string('slug');
            $table->string('path');
            $table->timestamps();
        });

        Schema::create('sesi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_bab')->constrained('bab')->onDelete('cascade');
            $table->string('nama_sesi');
            $table->string('header');
            $table->timestamps();
        });

        Schema::create('soal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sesi')->constrained('sesi')->onDelete('cascade');
            $table->enum('tipe', ['mcq', 'text', 'multiple_ordered', 'multiple']);
            $table->text('soal');
            $table->json('opsi')->nullable();
            $table->string('jawaban');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soal');
        Schema::dropIfExists('sesi');
        Schema::dropIfExists('materi');
        Schema::dropIfExists('bab');
    }
};
