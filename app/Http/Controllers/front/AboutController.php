<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Tampilabout;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        $abouts = Tampilabout::get();
        return view('front.about.index', [
            'programs' => $programs,
            'abouts'   => $abouts
        ]);
    }
}
