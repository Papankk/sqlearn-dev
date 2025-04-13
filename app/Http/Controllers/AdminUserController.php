<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function index()
    {
        $data = [
            'data_user' => User::all()
        ];

        return view('admin.user', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'heart' => 'required|integer|min:0|max:5',
                'diamond' => 'required|integer|min:0',
                'is_admin' => 'nullable|in:on',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('modal', 'UpdateUser' . $id);
        }

        $user = User::findOrFail($id);

        $isSelfUpdate = Auth::user()->id == $user->id;

        $user->heart = $validated['heart'];
        $user->diamond = $validated['diamond'];
        if (!$isSelfUpdate) {
            $user->is_admin = $request->has('is_admin') ? 1 : 0;
        }

        $user->save();

        return redirect()->back()->with('success', 'User berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if (Auth::user()->id == $user->id) {
            return redirect()->back()->with('error', 'Tidak bisa menghapus akun yang sedang login.');
        }

        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus.');
    }
}
