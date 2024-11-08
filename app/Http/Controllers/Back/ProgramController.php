<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function index()
    {
        return view('back.program.index', [
            'programs' => Program::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $messages = [
            'judul.required' => 'Judul harus diisi.',
            'judul.min' => 'Judul harus diisi minimal 3 karakter.',
            'img.required' => 'Foto harus diisi.',
            'img.image' => 'Foto harus berupa gambar.',
            'img.mimes' => 'Foto harus berformat jpeg, png, jpg, gif.',
            'img.max' => 'Foto maksimal berukuran 3MB.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'status.required' => 'Status harus diisi.'
        ];

        $data = $request->validate([
            'judul' => 'required|min:3',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:3072',
            'deskripsi' => 'required',
            'status' => 'required|in:unggulan,dijalankan'
        ], $messages);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/back/program/', $fileName);

            $data['img'] = $fileName;
        }

        Program::create($data);

        return back()->with('success', 'Program Berhasil Ditambahkan');
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'judul.required' => 'Judul harus diisi.',
            'judul.min' => 'Judul harus diisi minimal 3 karakter.',
            'img.image' => 'Foto harus berupa gambar.',
            'img.mimes' => 'Foto harus berformat jpeg, png, jpg, gif.',
            'img.max' => 'Foto maksimal berukuran 3MB.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'status.required' => 'Status harus diisi.',
        ];

        $data = $request->validate([
            'judul' => 'required|min:3',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
            'deskripsi' => 'required',
            'status' => 'required|in:unggulan,dijalankan'
        ], $messages);


        $program = Program::findOrFail($id);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/back/program/', $fileName);

            // Hapus foto lama jika ada
            if ($program->img && Storage::exists('public/back/' . $program->img)) {
                Storage::delete('public/back/program/' . $program->img);
            }

            $data['img'] = $fileName;
        } else {
            $data['img'] = $program->img; // Tetapkan img lama jika tidak ada file baru yang diupload
        }

        Program::find($id)->update($data);
        return back()->with('success', 'Program Berhasil Diedit');
    }

    public function destroy(string $id)
    {

        $data = Program::find($id);
        Storage::delete('public/back/program/' . $data->img);
        $data->delete();

        return back()->with('success', 'Program Berhasil Dihapus');
    }
}
