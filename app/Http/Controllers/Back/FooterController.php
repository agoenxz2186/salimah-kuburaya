<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        return view('back.mediasocial.index', [
            'mediasocials' => Footer::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'judul' => 'required|min:3',
            'link' => 'required'
        ];

        $messages = [
            'judul.required' => 'Judul Wajib Diisi!',
            'judul.min' => 'Judul harus minimal 3 karakter!',
            'link.required' => 'Link Wajib Diisi!',
        ];

        $data = $request->validate($rules, $messages);

        Footer::create($data);

        return redirect()->back()->with('success', 'Media Social berhasil ditambahkan');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'judul' => 'required|min:3',
            'link' => 'required'
        ];

        $messages = [
            'judul.required' => 'Judul Wajib Diisi!',
            'judul.min' => 'Judul harus minimal 3 karakter!',
            'link.required' => 'Link Wajib Diisi!',
        ];

        $data = $request->validate($rules, $messages);

        $mediasocials = Footer::findOrFail($id);
        $mediasocials->update($data);

        return redirect()->back()->with('success', 'Video berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        Footer::find($id)->delete();
        return back()->with('success', 'media social Berhasil Dihapus');
    }

    public static function getFooterData()
    {
        $footerData = Footer::all(); // Mengambil semua data footer, sesuaikan dengan kebutuhan
        return $footerData;
    }
}
