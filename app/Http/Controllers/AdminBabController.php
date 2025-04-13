<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bab;

class AdminBabController extends Controller
{
    public function index()
    {
        $data = [
            'data_mapel' => Bab::all()
        ];

        return view('admin.mapel', compact('data'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('thumbnail_upload')) {

            $file = $request->file('thumbnail_upload');
            $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/media/'), $filename);

            return response()->json([
                'thumbnail_path' => 'assets/images/media/' . $filename
            ]);
        }

        try {
            $validated = $request->validate([
                'nama_bab' => 'required|string',
                'header' => 'required|string',
                'deskripsi' => 'required|string',
                'thumbnail' => 'required|string',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('modal', 'CreateBab');
        }

        Bab::create([
            'nama_bab' => $validated['nama_bab'],
            'header' => $validated['header'],
            'deskripsi' => $validated['deskripsi'],
            'slug' => str_replace(' ', '-', strtolower($validated['nama_bab'])),
            'gambar_bab' => $validated['thumbnail'],
        ]);

        return redirect()->back()->with('success', 'Bab berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $bab = Bab::findOrFail($id);

        try {
            $validated = $request->validate([
                'nama_bab' => 'required|string',
                'header' => 'required|string',
                'deskripsi' => 'required|string',
                'thumbnail' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('modal', 'EditBab' . $id);
        }

        if ($request->hasFile('thumbnail')) {

            $oldPath = public_path($bab->gambar_bab);
            if ($bab->gambar_bab && file_exists($oldPath)) {
                unlink($oldPath);
            }

            $file = $request->file('thumbnail');
            $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/media'), $filename);

            $validated['thumbnail'] = 'assets/images/media/' . $filename;
        } else {
            $validated['thumbnail'] = $bab->gambar_bab;
        }

        $bab->update([
            'nama_bab' => $validated['nama_bab'],
            'header' => $validated['header'],
            'deskripsi' => $validated['deskripsi'],
            'slug' => str_replace(' ', '-', strtolower($validated['nama_bab'])),
            'gambar_bab' => $validated['thumbnail'],
        ]);

        return redirect()->back()->with('success', 'Data Bab berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $bab = Bab::findOrFail($id);

        if ($bab->gambar_bab && file_exists(public_path($bab->gambar_bab))) {
            unlink(public_path($bab->gambar_bab));
        }

        $bab->delete();

        return redirect()->back()->with('success', 'Data bab berhasil dihapus!');
    }
}
