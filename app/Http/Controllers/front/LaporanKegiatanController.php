<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanKegiatanController extends Controller
{
    public function index()
    {
        $keyword = request()->keyword;

        if ($keyword) {
            $laporankegiatan = Laporan::with('cabang', 'user')
                ->where('status', 'diproses')
                ->where('visibility', 'publish')
                ->where('judul', 'like', '%' . $keyword . '%')
                ->latest()
                ->paginate(6);
        } else {
            $laporankegiatan = Laporan::with('cabang', 'user')
                ->where('status', 'diproses')
                ->where('visibility', 'publish')
                ->latest()
                ->paginate(6);
        }

        return view('front.laporankegiatan.index', compact('laporankegiatan'));
    }

    public function Labselesai()
    {
        $keyword = request()->keyword;

        if ($keyword) {
            $laporankegiatan = Laporan::with('cabang', 'user')
                ->where('status', 'selesai')
                ->where('visibility', 'publish')
                ->where('judul', 'like', '%' . $keyword . '%')
                ->latest()
                ->paginate(6);
        } else {
            $laporankegiatan = Laporan::with('cabang', 'user')
                ->where('status', 'selesai')
                ->where('visibility', 'publish')
                ->latest()
                ->paginate(6);
        }

        return view('front.laporankegiatan.laporankegiatanselesai', compact('laporankegiatan'));
    }
    public function cetak($id)
    {
        $laporan = Laporan::with('cabang', 'laporanKeuangans')->findOrFail($id);

        // Pastikan hanya laporan dengan status 'selesai' dan visibility 'publish' yang bisa dicetak
        if ($laporan->status !== 'selesai' || $laporan->visibility !== 'publish') {
            return redirect()->back()->with('error', 'Laporan ini belum selesai atau belum dipublikasikan dan tidak bisa dicetak.');
        }

        // Hitung total masuk, total keluar, dan sisa uang
        $totalMasuk = $laporan->laporanKeuangans->where('jenis', 'masuk')->sum('nominal');
        $totalKeluar = $laporan->laporanKeuangans->where('jenis', 'keluar')->sum('nominal');
        $sisaUang = $totalMasuk - $totalKeluar;

        // Kirim data laporan dan hasil perhitungan ke view cetak
        return view('front.laporankegiatan.cetak', compact('laporan', 'totalMasuk', 'totalKeluar', 'sisaUang'));
    }
}
