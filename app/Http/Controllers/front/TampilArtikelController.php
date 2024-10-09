<?php

namespace App\Http\Controllers\front;

use App\Models\artikel;
use App\Models\kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TampilArtikelController extends Controller
{
    public function show($slug)
    {

        $artikel = artikel::whereSlug($slug)->firstOrFail();
        $artikel->increment('view');

        return view('front.artikel.show', [
            'artikel' => $artikel,
            'kategoris' => kategori::latest()->get()
        ]);
    }
}
