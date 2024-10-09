<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Tampilabout as ModelsTampilabout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TampilAbout extends Controller
{
    public function index()
    {
        return view('back.editabout.index', [
            'abouts' => ModelsTampilabout::latest()->get()
        ]);
    }

    public function show(string $id)
    {
        return view('back.editabout.detail', [
            'abouts' => ModelsTampilabout::find($id)
        ]);
    }

    public function edit($id)
    {
        $abouts = ModelsTampilabout::findOrFail($id);
        return view('back.editabout.update', [
            'abouts'   => ModelsTampilabout::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {


        // Validasi input
        $request->validate([
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'judulmap' => 'required|string',
            'map' => 'required|string',
        ]);

        $abouts = ModelsTampilabout::findOrFail($id);
        // Handle file upload
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/back/about/', $fileName);

            // Hapus foto lama jika ada
            if ($abouts->img && Storage::exists('public/back/about/' . $abouts->img)) {
                Storage::delete('public/back/about/' . $abouts->img);
            }

            $abouts->img = $fileName; // Update nama file gambar
        }

        // Update data abouts
        $abouts->judul = $request->input('judul');
        $abouts->deskripsi = $request->input('deskripsi');
        $abouts->visi = $request->input('visi');
        $abouts->misi = $request->input('misi');
        $abouts->judulmap = $request->input('judulmap');
        $abouts->map = $request->input('map');

        $abouts->save();

        return redirect(url('editabout'))->with('success', 'Tampilan About berhasil diperbarui!');
    }
}
