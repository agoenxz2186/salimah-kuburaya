<?php

namespace App\Http\Controllers\Back;

use App\Models\Cabang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CabangController extends Controller
{
    public function index()
    {
        return view('back.cabang.index', [
            'cabangs' => Cabang::latest()->get()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'nama.required' => 'Nama harus diisi.',
            'nama.min' => 'Nama harus diisi minimal 3 karakter.',
        ];

        $data = $request->validate([
            'nama' => 'required|min:3'
        ], $messages);

        $data['slug'] = Str::slug($data['nama']);

        Cabang::create($data);
        return back()->with('success', 'Cabang Berhasil Ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'nama.required' => 'Nama harus diisi.',
            'nama.min' => 'Nama harus diisi minimal 3 karakter.',
        ];

        $data = $request->validate([
            'nama' => 'required|min:3'
        ], $messages);

        $data['slug'] = Str::slug($data['nama']);

        Cabang::find($id)->update($data);
        return back()->with('success', 'Cabang Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cabang::find($id)->delete();
        return back()->with('success', 'Cabang Berhasil Dihapus');
    }
}
