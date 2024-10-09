<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{

    public function index()
    {
        $keyword = request()->keyword;
        if ($keyword) {
            $galeris = galeri::where('judul', 'like', '%' . $keyword . '%')
                ->latest()
                ->paginate(6);
        } else {
            $galeris = galeri::latest()->paginate(6);
        }

        return view('front.galeri.index', [
            'galeris' => galeri::orderBy('id', 'desc')->latest()->paginate(6),
            'galeris' => $galeris
        ]);
    }
}
