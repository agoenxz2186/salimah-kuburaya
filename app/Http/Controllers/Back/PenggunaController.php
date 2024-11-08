<?php

namespace App\Http\Controllers\Back;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cabang;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cabangs = Cabang::all();

        return view('back.pengguna.index', [
            'penggunas' => User::latest()->get(),
            'cabangs' => $cabangs // Kirim variabel $cabangs ke view
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'nohp' => 'nullable',
            'role' => 'required|in:admin_Pusat,admin_cabang',
            'cabang_id' => 'nullable|exists:cabangs,id',
        ]);

        if ($request->role == 'admin_cabang') {
            $request->validate([
                'cabang_id' => 'required|exists:cabangs,id',
            ]);
        }

        // Generate default password based on the name
        $data['password'] = bcrypt(Str::slug($data['name'], ''));

        User::create($data);
        return back()->with('success', 'Pengguna Berhasil Ditambahkan');
    }

    public function edit()
    {
        $user = auth()->user();
        return view('back.profile.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'nohp' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
        ], [
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // Periksa apakah bidang password tidak kosong
        if ($request->filled('password')) {
            // Jika tidak kosong, ubah password
            $data['password'] = Hash::make($request->password);
        } else {
            // Jika kosong, hapus key 'password' dari data yang akan diupdate
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }


    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('success', 'Pengguna Berhasil Dihapus');
    }
}
