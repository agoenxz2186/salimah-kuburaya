<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesionCOntroller extends Controller
{
    function index()
    {
        return view('back.admin.login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'password Wajib Diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            return redirect('/Dashboardadmin');
            exit;
        } else {
            return redirect('/adlogsalimah')->withErrors('Email dan Password yang dimasukkan tidak sesuai')->withInput();
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/adlogsalimah');
    }
}
