<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pdf;

class PdfController extends Controller
{
    public function show($id)
    {
        $pdf = Pdf::findOrFail($id);
        return view('materi', compact('pdf'));
    }
}
