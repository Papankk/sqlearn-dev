<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;

class BelajarController extends Controller
{
    public function index()
    {
        $data_materi = Materi::all();

        return view('belajar.index', compact('data_materi'));
    }

    public function show($slug)
    {
        $materi = Materi::where('slug', $slug)->firstOrFail();

        $data_materi = Materi::where('id', $materi->id)->firstOrFail();

        return view('belajar.show', compact('data_materi'));
    }
}
