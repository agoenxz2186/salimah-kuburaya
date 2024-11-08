<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{

    public function index()
    {
        $keyword = request()->keyword;
        if ($keyword) {
            $galeris = Galeri::where('judul', 'like', '%' . $keyword . '%')
                ->latest()
                ->paginate(6);
        } else {
            $galeris = Galeri::latest()->paginate(6);
        }

        return view('front.galeri.index', [
            'galeris' => Galeri::orderBy('id', 'desc')->latest()->paginate(6),
            'galeris' => $galeris
        ]);
    }
}
