<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Materi;
use App\Models\Bab;

class AdminMateriController extends Controller
{
    public function index()
    {
        $usedBabIds = Materi::pluck('id_bab')->toArray();

        $data = [
            'data_bab' => Bab::whereNotIn('id', $usedBabIds)->get(),
            'data_materi' => Materi::with('bab')->get(),
        ];

        return view('admin.materi', compact('data'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'bab' => 'required|exists:bab,id',
                'judul_materi' => 'required|string|max:255',
                'path' => 'required|file|mimes:pdf|max:10240',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('modal', 'CreateMateri');
        }

        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destination = public_path('files');

            // Ensure the folder exists
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }

            $file->move($destination, $filename);
            $pdfPath = 'files/' . $filename; // relative path to be stored in DB
        }

        Materi::create([
            'id_bab' => $request->bab,
            'judul_materi' => $request->judul_materi,
            'slug' => str_replace(' ', '-', strtolower($request->judul_materi)),
            'path' => $pdfPath,
        ]);

        return redirect()->back()->with('success', 'Materi berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $materi = Materi::findOrFail($id);

        try {
            $request->validate([
                'bab' => 'required|exists:bab,id',
                'judul_materi' => 'required|string|max:255',
                'path' => 'nullable|file|mimes:pdf|max:10240',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('modal', 'UpdateMateri' . $id);
        }

        // Update fields
        $materi->id_bab = $request->bab;
        $materi->judul_materi = $request->judul_materi;

        // File upload (replace)
        if ($request->hasFile('path')) {
            // delete old if exists
            if ($materi->path && file_exists(public_path('files/' . $materi->path))) {
                unlink(public_path('files/' . $materi->path));
            }

            $file = $request->file('path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files'), $filename);

            $materi->path = $filename;
        }

        $materi->save();

        return redirect()->back()->with('success', 'Materi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);

        // Delete file from public/files
        if ($materi->path && File::exists(public_path($materi->path))) {
            File::delete(public_path($materi->path));
        }

        // Delete from DB
        $materi->delete();

        return redirect()->back()->with('success', 'Materi berhasil dihapus.');
    }
}
