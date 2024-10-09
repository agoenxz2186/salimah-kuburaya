<?php

namespace App\Http\Controllers\back;

use App\Models\Cabang;
use App\Models\Laporan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LaporanRequest;
use App\Http\Requests\UpdateLaporanRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporanCount = Laporan::count();
        // Menghitung jumlah laporan
        // auth pengguna
        $user = auth()->user();

        // cek apakah yang login admin pusat
        if ($user->admin_Pusat()) {
            // jika admin pusat, tampilkan semua laporan
            $laporans = Laporan::latest()->get();
        } else {
            // jika bukan, tampilkan sesuai cabang user
            $laporans = Laporan::where('cabang_id', $user->cabang_id)->latest()->get();
        }
        return view('back.laporan.index', [
            'laporans' => $laporans,
            'laporanCount' => $laporanCount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.laporan.create', [
            'cabangs' => Cabang::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LaporanRequest $request)
    {
        $data = $request->validated();

        $file = $request->file('img');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/back', $fileName);

        $data['img'] = $fileName;
        $data['slug'] = Str::slug($data['judul']);

        // Tentukan cabang_id berdasarkan pengguna yang saat ini masuk
        if (auth()->user()->admin_Pusat()) {
            // Ambil dari request jika admin pusat
            $data['cabang_id'] = $request->input('cabang_id');
        } else {
            // Gunakan cabang_id dari user yang login jika bukan admin pusat
            $data['cabang_id'] = auth()->user()->cabang_id;
        }
        // Isi user_id dengan ID pengguna yang saat ini masuk
        $data['user_id'] = auth()->id();
        $data['donasi'] = $request->input('donasi');
        Laporan::create($data);

        return redirect(url('laporan'))->with('success', 'Data Laporan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $laporan = Laporan::find($id);

        // Jika laporan tidak ditemukan, kembalikan dengan pesan error
        if (!$laporan) {
            return redirect()->route('laporan.index')->with('error', 'Laporan tidak ditemukan.');
        }

        // Dapatkan cabang dari pengguna yang terautentikasi
        $userCabangId = auth()->user()->cabang_id;

        // Periksa apakah laporan yang diminta adalah milik cabang pengguna
        if ($laporan->cabang_id != $userCabangId && !auth()->user()->admin_Pusat()) {
            return redirect()->route('laporan.index')->with('error', 'Anda tidak memiliki izin untuk mengakses laporan ini.');
        }

        // Cek status laporan
        if ($laporan->status == 'menunggu' || $laporan->status == 'ditolak') {
            // Jika status adalah 'menunggu' atau 'ditolak', hanya admin pusat yang bisa melihat detail
            if (!auth()->user()->admin_Pusat()) {
                return redirect()->route('laporan.index')->with('error', 'Anda belum memiliki izin untuk mengakses halaman ini.');
            }
        }
        return view('back.laporan.show', compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $laporan = Laporan::find($id);

        // Jika laporan tidak ditemukan, kembalikan dengan pesan error
        if (!$laporan) {
            return redirect()->route('laporan.index')->with('error', 'Laporan tidak ditemukan.');
        }

        // Dapatkan cabang dari pengguna yang terautentikasi
        $userCabangId = auth()->user()->cabang_id;

        // Periksa apakah laporan yang diminta adalah milik cabang pengguna
        if ($laporan->cabang_id != $userCabangId && !auth()->user()->admin_Pusat()) {
            return redirect()->route('laporan.index')->with('error', 'Anda tidak memiliki izin untuk mengedit laporan ini.');
        }

        return view('back.laporan.update', [
            'laporan'   => $laporan,
            'cabangs' => Cabang::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLaporanRequest $request, string $id)
    {
        // Temukan laporan berdasarkan ID
        $laporan = Laporan::findOrFail($id);

        $data = $request->validated();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/back', $fileName);

            // Hapus foto lama jika ada
            if ($laporan->img) {
                Storage::delete('public/back/' . $laporan->img);
            }

            $data['img'] = $fileName;
        }

        // Pastikan hanya admin pusat yang dapat mengubah status laporan
        if (auth()->user()->admin_Pusat()) {
            $laporan->update($data);

            return redirect(url('laporan'))->with('success', 'Data Laporan Berhasil Diedit');
        }

        // Biarkan admin lainnya memperbarui laporan kecuali statusnya
        unset($data['status']);

        $laporan->update($data);

        return redirect(url('laporan'))->with('success', 'Data Laporan Berhasil Diedit');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Laporan::find($id);
        Storage::delete('public/back/' . $data->img);
        $data->delete();

        return response()->json([
            'message' => 'Data Artikel Sudah Dihapus'
        ]);
    }

    // Metode untuk mencetak laporan
    public function cetak($id)
    {
        $laporan = Laporan::with('cabang', 'laporanKeuangans')->findOrFail($id);

        // Periksa status laporan
        if ($laporan->status != 'selesai') {
            // Jika status bukan 'selesai', kembalikan ke halaman sebelumnya dengan pesan error
            return redirect()->back()->with('error', 'Laporan hanya dapat dicetak jika statusnya sudah selesai.');
        }

        // Hitung total masuk, total keluar, dan sisa uang
        $totalMasuk = $laporan->laporanKeuangans->where('jenis', 'masuk')->sum('nominal');
        $totalKeluar = $laporan->laporanKeuangans->where('jenis', 'keluar')->sum('nominal');
        $sisaUang = $totalMasuk - $totalKeluar;

        // Kirim data laporan dan hasil perhitungan ke view cetak
        return view('back.laporan.cetak', compact('laporan', 'totalMasuk', 'totalKeluar', 'sisaUang'));
    }

    public function filterByStatus(Request $request)
    {
        $status = $request->input('status');

        // Query data laporan berdasarkan status yang dipilih
        if ($status) {
            $laporans = Laporan::where('status', $status)->get();
        } else {
            $laporans = Laporan::all();
        }

        // Load view dan kirimkan data laporan yang baru
        return view('back.laporan.laporan_table', compact('laporans'))->render();
    }
    public function markAsSelesai($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->status = 'menunggu_verifikasi';
        $laporan->save();

        return redirect()->route('laporan.index')->with('status', 'Laporan telah ditandai sebagai selesai dan menunggu verifikasi.');
    }
}
