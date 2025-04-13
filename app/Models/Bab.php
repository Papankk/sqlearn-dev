<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bab extends Model
{
    protected $table = 'bab';

    protected $fillable = [
        'nama_bab',
        'slug',
        'header',
        'deskripsi',
        'gambar_bab',
    ];

    public function sesi()
    {
        return $this->hasMany(Sesi::class);
    }

    public function materi()
    {
        return $this->hasOne(Materi::class, 'id_bab');
    }
}
