<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Beranda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BerandaController extends Controller
{
    public function index()
    {
        return view('back.editberanda.index', [
            'berandas' => Beranda::latest()->get()
        ]);
    }


    public function show(string $id)
    {
        return view('back.editberanda.detail', [
            'beranda' => Beranda::find($id)
        ]);
    }
    // Menampilkan form edit
    public function edit($id)
    {
        $beranda = Beranda::findOrFail($id);
        return view('back.editberanda.update', [
            'beranda'   => Beranda::find($id)
        ]);
    }

    // Menangani pembaruan data
    public function update(Request $request, $id)
    {


        // Validasi input
        $request->validate([
            'backgroundIMG' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
            'fotoketua' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
            'deskripsi' => 'required|string',
            'sambutan' => 'required|string',
        ]);

        $beranda = Beranda::findOrFail($id);
        // Simpan file gambar jika diunggah
        if ($request->hasFile('backgroundIMG')) {
            $file = $request->file('backgroundIMG');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/back', $fileName);

            // Unlink img/hapus foto lama
            Storage::delete('public/back/' . $beranda->backgroundIMG);
            $beranda->backgroundIMG = $fileName;
        }

        if ($request->hasFile('fotoketua')) {
            $file = $request->file('fotoketua');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/back', $fileName);

            // Unlink img/hapus foto lama
            Storage::delete('public/back/' . $beranda->fotoketua);
            $beranda->fotoketua = $fileName;
        }

        // Update data beranda
        $beranda->deskripsi = $request->input('deskripsi');
        $beranda->sambutan = $request->input('sambutan');

        $beranda->save();

        return redirect(url('berandaadmin'))->with('success', 'Beranda berhasil diperbarui!');
    }
}
