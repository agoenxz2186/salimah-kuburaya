<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\artikel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index($slugKategori)
    {

        return view('front.kategori.index', [
            'artikels' => artikel::with('Kategori')->whereStatus(1)->whereHas('Kategori', function ($q) use ($slugKategori) {
                $q->where('slug', $slugKategori);
            })->latest()->paginate(6),
            'kategori' => $slugKategori
        ]);
    }
}
