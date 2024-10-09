<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\artikel;
use App\Models\Beranda;
use App\Models\galeri;
use App\Models\kategori;
use App\Models\Laporan;
use App\Models\Program;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $artikels = artikel::with('kategori')->whereStatus(1)->latest()->limit(3)->get();
        $galeris = galeri::latest()->limit(3)->get();
        $berandas = Beranda::get();
        $programs = Program::where('status', 'unggulan')->get();
        $agendas = Laporan::with('cabang', 'user')
            ->where('status', 'diproses')
            ->where('visibility', 'publish')
            ->limit(3)
            ->latest()
            ->get();

        return view('front.dashboard.index', [
            'artikels' => $artikels,
            'kategoris' => kategori::latest()->get(),
            'galeris' => $galeris,
            'berandas' => $berandas,
            'programs' => $programs,
            'agendas' => $agendas
        ]);
    }
}
