<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\Kategori;
use App\Models\Laporan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('back.admin.index', [
            'total_artikels' => Artikel::count(),
            'total_kategoris' => Kategori::count(),
            'total_videos' => Galeri::count(),
            'total_laporan_menunggu' => Laporan::where('status', 'menunggu')->count(),
            'total_laporan_menunggu_verif' => Laporan::where('status', 'menunggu_verifikasi')->count(),
            'total_laporan_diproses' => Laporan::where('status', 'diproses')->count(),
            'total_laporan_selesai' => Laporan::where('status', 'selesai')->count(),
            'latest_artikels' => Artikel::with('kategori')->whereStatus(1)->latest()->take(3)->get(),
            'populer_artikels' => Artikel::with('kategori')->whereStatus(1)->orderBy('view', 'desc')->take(3)->get()
        ]);
    }
}
