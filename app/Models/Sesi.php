<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    protected $table = 'sesi';

    protected $fillable = [
        'id_bab',
        'nama_sesi',
        'header'
    ];

    public function bab()
    {
        return $this->belongsTo(Bab::class, 'id_bab');
    }
}
