<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\LaporanKeuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($laporanId)
    {
        $laporan = Laporan::findOrFail($laporanId);
        return view('back.laporankeuangan.create', compact('laporan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $laporanId)
    {
        $request->validate([
            'jenis.*' => 'required|in:masuk,keluar',
            'nominal.*' => 'required|numeric',
            'keterangan.*' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072', // ubah menjadi nullable untuk opsional
        ]);

        $fileName = null;

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/back', $fileName);
        }

        $laporan = Laporan::findOrFail($laporanId);

        foreach ($request->jenis as $index => $jenis) {
            $laporan->laporanKeuangans()->create([
                'jenis' => $jenis,
                'nominal' => $request->nominal[$index],
                'keterangan' => $request->keterangan[$index],
                'img' => $fileName, // simpan nama file ke dalam database jika ada
            ]);
        }

        return redirect()->route('laporan.show', $laporanId)->with('success', 'Laporan Keuangan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $laporan = Laporan::with('laporanKeuangans')->findOrFail($id);
        return view('back.laporan.show', compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($laporanId)
    {
        $laporan = Laporan::findOrFail($laporanId);
        $laporanKeuangans = $laporan->laporanKeuangans;
        $totalMasuk = $laporanKeuangans->where('jenis', 'masuk')->sum('nominal');
        $totalKeluar = $laporanKeuangans->where('jenis', 'keluar')->sum('nominal');
        return view('back.laporankeuangan.edit', compact('laporan', 'laporanKeuangans', 'totalMasuk', 'totalKeluar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $laporanId)
    {
        $request->validate([
            'jenis.*' => 'required|in:masuk,keluar',
            'nominal.*' => 'required|numeric',
            'keterangan.*' => 'required|string|max:255',
            'laporanKeuanganId.*' => 'required|exists:laporan_keuangans,id',
            'img.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
        ]);

        $laporan = Laporan::findOrFail($laporanId);

        // Update laporan keuangan yang ada
        foreach ($request->laporanKeuanganId as $index => $laporanKeuanganId) {
            $laporanKeuangan = LaporanKeuangan::findOrFail($laporanKeuanganId);

            // Update gambar jika ada file yang diunggah
            if ($request->hasFile('img') && $request->file('img')[$index]) {
                $file = $request->file('img')[$index];
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/back', $fileName);

                // Hapus foto lama jika ada
                if ($laporanKeuangan->img) {
                    Storage::delete('public/back/' . $laporanKeuangan->img);
                }

                // Simpan nama file baru ke dalam data laporan keuangan
                $laporanKeuangan->img = $fileName;
            }

            // Update data laporan keuangan
            $laporanKeuangan->jenis = $request->jenis[$index];
            $laporanKeuangan->nominal = $request->nominal[$index];
            $laporanKeuangan->keterangan = $request->keterangan[$index];
            $laporanKeuangan->save();
        }

        return redirect()->route('laporan.show', $laporanId)->with('success', 'Laporan Keuangan berhasil diperbarui');
    }







    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $laporanKeuangan = LaporanKeuangan::findOrFail($id);
        $laporanKeuangan->delete();

        return redirect()->back()->with('success', 'Laporan Keuangan berhasil dihapus.');
    }
}
