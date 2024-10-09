<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\artikel;
use App\Models\galeri;
use App\Models\kategori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('back.admin.index', [
            'total_artikels' => artikel::count(),
            'total_kategoris' => kategori::count(),
            'total_videos' => galeri::count()
        ]);
    }
}
