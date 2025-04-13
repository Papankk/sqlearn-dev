<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'soal';

    protected $fillable = [
        'id_sesi',
        'tipe',
        'soal',
        'opsi',
        'jawaban',
    ];

    public function sesi()
    {
        return $this->belongsTo(Sesi::class, 'id_sesi');
    }
}
