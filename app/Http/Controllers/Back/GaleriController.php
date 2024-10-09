<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\galeri;
use App\Models\Laporan;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        // Cek apakah pengguna adalah admin pusat atau admin cabang
        if ($user->role == 'admin_Pusat') {
            // Jika admin pusat, ambil semua laporan
            $laporans = Laporan::all();
        } else {
            // Jika admin cabang, filter laporan berdasarkan cabang_id
            $laporans = Laporan::where('cabang_id', $user->cabang_id)->latest()->get();
        }
        $galeris = galeri::orderBy('id', 'desc')->get(); // Ambil semua data galeri

        return view('back.galeri.index', [
            'galeris' => $galeris,
            'laporans' => $laporans
        ]);
    }


    public function store(Request $request)
    {
        $rules = [
            // Jika judul dari laporan dipilih, maka judul baru tidak wajib diisi
            'judul' => $request->judul ? 'required|min:3' : 'nullable',
            'youtube_code' => 'required'
        ];

        $messages = [
            'judul.required' => 'Judul Wajib Diisi!',
            'judul.min' => 'Judul harus minimal 3 karakter!',
            'youtube_code.required' => 'Code Youtube Wajib Diisi!',
        ];

        $data = $request->validate($rules, $messages);

        galeri::create($data);

        return redirect()->back()->with('success', 'Video berhasil ditambahkan');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Cek apakah judul dari laporan dipilih
        $judul_dipilih = $request->input('judul') ? true : false;

        // Aturan validasi
        $rules = [
            // Jika judul dari laporan tidak dipilih, maka judul manual harus diisi
            'judul' => !$judul_dipilih ? 'required|min:3' : 'nullable',
            'youtube_code' => 'required'
        ];

        $messages = [
            'judul.required' => 'Judul Wajib Diisi jika tidak memilih dari laporan!',
            'judul.min' => 'Judul harus minimal 3 karakter!',
            'youtube_code.required' => 'Kode YouTube Wajib Diisi!',
        ];

        // Validasi input
        $data = $request->validate($rules, $messages);

        // Update data galeri
        $galeri = galeri::findOrFail($id);
        $galeri->update($data);

        return redirect()->back()->with('success', 'Video berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        galeri::find($id)->delete();
        return back()->with('success', 'Video Berhasil Dihapus');
    }
}
