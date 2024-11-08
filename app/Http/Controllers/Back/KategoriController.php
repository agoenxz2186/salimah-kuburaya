<?php

namespace App\Http\Controllers\Back;

use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.kategori.index', [
            'kategoris' => Kategori::latest()->get()
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

        Kategori::create($data);
        return back()->with('success', 'Kategori Berhasil Ditambahkan');
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

        Kategori::find($id)->update($data);
        return back()->with('success', 'Kategori Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kategori::find($id)->delete();
        return back()->with('success', 'Kategori Berhasil Dihapus');
    }
}
