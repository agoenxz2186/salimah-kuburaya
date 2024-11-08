<?php

namespace App\Http\Controllers\front;

use App\Models\Artikel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori;

class ArtikelHomeController extends Controller
{
    public function index()
    {
        $keyword = request()->keyword;

        if ($keyword) {
            $artikels = Artikel::with('kategori')
                ->whereStatus(1)
                ->where('judul', 'like', '%' . $keyword . '%')
                ->latest()
                ->paginate(6);
        } else {
            $artikels = Artikel::with('kategori')->whereStatus(1)->latest()->paginate(6);
        }

        $latest_post = Artikel::whereStatus(1)->latest()->first();

        return view('front.artikel.index', [
            'latest_post' => $latest_post,
            'artikels' => $artikels,
            'kategoris' => Kategori::latest()->get()
        ]);
    }
}
