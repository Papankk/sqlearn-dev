<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi';

    protected $fillable = [
        'id_bab',
        'judul_materi',
        'slug',
        'path'
    ];

    public function bab()
    {
        return $this->belongsTo(Bab::class, 'id_bab');
    }
}
