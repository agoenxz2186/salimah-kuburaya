<?php

namespace App\Http\Controllers\front;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TampilArtikelController extends Controller
{
    public function show($slug)
    {

        $artikel = Artikel::whereSlug($slug)->firstOrFail();
        $artikel->increment('view');

        return view('front.artikel.show', [
            'artikel' => $artikel,
            'kategoris' => Kategori::latest()->get()
        ]);
    }
}
