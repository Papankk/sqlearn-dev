<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sesi;
use App\Models\Bab;

class AdminSesiController extends Controller
{
    public function index()
    {
        $data = [
            'data_sesi' => Sesi::with('bab')->get(),
            'data_bab' => Bab::all()
        ];

        return view('admin.sesi', compact('data'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'bab' => 'required|exists:bab,id',
                'nama_sesi' => 'required|string|max:255',
                'header' => 'required|string|max:255',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('modal', 'CreateSesi');
        }

        Sesi::create([
            'id_bab' => $validated['bab'],
            'nama_sesi' => $validated['nama_sesi'],
            'header' => $validated['header'],
        ]);

        return redirect()->back()->with('success', 'Sesi berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'bab' => 'required|exists:bab,id',
                'nama_sesi' => 'required|string|max:255',
                'header' => 'required|string|max:255',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('modal', 'UpdateSesi' . $id);
        }

        $sesi = Sesi::findOrFail($id);

        $sesi->update([
            'id_bab' => $validated['bab'],
            'nama_sesi' => $validated['nama_sesi'],
            'header' => $validated['header'],
        ]);

        return redirect()->back()->with('success', 'Sesi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $sesi = Sesi::findOrFail($id);
        $sesi->delete();

        return redirect()->back()->with('success', 'Sesi berhasil dihapus!');
    }
}
