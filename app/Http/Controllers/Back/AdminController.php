<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\artikel;
use App\Models\galeri;
use App\Models\kategori;
use App\Models\Laporan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('back.admin.index', [
            'total_artikels' => artikel::count(),
            'total_kategoris' => kategori::count(),
            'total_videos' => galeri::count(),
            'total_laporan_menunggu' => Laporan::where('status', 'menunggu')->count(),
            'total_laporan_menunggu_verif' => Laporan::where('status', 'menunggu_verifikasi')->count(),
            'total_laporan_diproses' => Laporan::where('status', 'diproses')->count(),
            'total_laporan_selesai' => Laporan::where('status', 'selesai')->count(),
            'latest_artikels' => artikel::with('kategori')->whereStatus(1)->latest()->take(3)->get(),
            'populer_artikels' => artikel::with('kategori')->whereStatus(1)->orderBy('view', 'desc')->take(3)->get()
        ]);
    }
}
