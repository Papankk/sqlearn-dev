<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soal;
use App\Models\Sesi;

class AdminSoalController extends Controller
{
    public function index()
    {
        $data = [
            'data_soal' => Soal::with('sesi.bab')->get(), // <-- eager load sesi + bab
            'data_sesi' => Sesi::whereNotNull('id_bab')->with('bab')->get()
        ];

        return view('admin.soal', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'soal' => 'required|string',
            'tipe' => 'required|in:mcq,text,multiple',
            'sesi' => 'required|exists:sesi,id',
            'opsi' => 'nullable|array',
            'jawaban' => 'required',
        ]);

        // Convert opsi to JSON if it's a valid array with at least one non-null entry
        $opsi = is_array($request->opsi) && count(array_filter($request->opsi)) > 0
            ? json_encode(array_values(array_filter($request->opsi)))
            : null;

        // Jawaban: convert to JSON array only if tipe is NOT text
        $jawaban = json_encode(array_values((array) $request->jawaban));

        Soal::create([
            'soal' => $request->soal,
            'tipe' => $request->tipe,
            'id_sesi' => $request->sesi,
            'opsi' => $opsi,
            'jawaban' => $jawaban,
        ]);

        return redirect()->back()->with('success', 'Soal berhasil disimpan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sesi' => 'required|exists:sesi,id',
            'soal' => 'required|string',
            'tipe' => 'required|in:mcq,text,multiple',
            'jawaban' => 'required',
            'opsi' => 'array|nullable'
        ]);

        $soal = Soal::findOrFail($id);
        $soal->id_sesi = $request->sesi;
        $soal->soal = $request->soal;
        $soal->tipe = $request->tipe;

        // Store opsi as JSON if available
        $soal->opsi = ($request->tipe) === 'text' ? null : json_encode($request->opsi);


        // Handle jawaban based on tipe
        if ($request->tipe === 'multiple') {
            $jawaban = $request->jawaban;
            $jawaban = array_values($jawaban);
            $soal->jawaban = json_encode(array_values($jawaban));
        } elseif ($request->tipe === 'mcq') {
            $jawaban = $request->jawaban;
            $soal->jawaban = [is_array($jawaban) ? $jawaban[0] : $jawaban]; // only take the selected one
        } else {
            $jawaban = $request->jawaban;
            $soal->jawaban = $jawaban = is_array($jawaban) ? [$jawaban] : [$jawaban];
        }

        $soal->save();

        return redirect()->back()->with('success', 'Soal berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $bab = Soal::findOrFail($id);

        $bab->delete();

        return redirect()->back()->with('success', 'Data bab berhasil dihapus!');
    }
}
