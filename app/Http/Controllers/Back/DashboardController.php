<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('back.admin.index', [
            'total_artikels' => Artikel::count(),
            'total_kategoris' => Kategori::count(),
            'total_videos' => Galeri::count()
        ]);
    }
}
