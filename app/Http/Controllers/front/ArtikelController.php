<?php

namespace App\Http\Controllers\front;

use App\Models\artikel;
use App\Models\kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArtikelRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateArtikelRequest;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.artikel.index', [
            'artikels' => Artikel::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.artikel.create', [
            'kategoris' => kategori::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArtikelRequest $request)
    {
        $data = $request->validated();

        $file = $request->file('img');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/back', $fileName);

        $data['img'] = $fileName;
        $data['slug'] = Str::slug($data['judul']);

        Artikel::create($data);

        return redirect(url('artikeladmin'))->with('success', 'Data Artikel Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('back.artikel.show', [
            'artikel' => artikel::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('back.artikel.update', [
            'artikel'   => artikel::find($id),
            'kategoris' => kategori::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArtikelRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/back', $fileName);


            //unlink img/hapus foto lama
            Storage::delete('public/back/' . $request->oldImg);
            $data['img'] = $fileName;
        } else {
            $data['img'] = $request->oldImg;
        }

        $data['slug'] = Str::slug($data['judul']);

        Artikel::find($id)->update($data);

        return redirect(url('artikeladmin'))->with('success', 'Data Artikel Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $data = artikel::find($id);
        Storage::delete('public/back/' . $data->img);
        $data->delete();

        return response()->json([
            'message' => 'Data Artikel Sudah Dihapus'
        ]);
    }
}
