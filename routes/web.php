<?php

use App\Http\Controllers\Back\AdminController;
use App\Http\Controllers\back\BerandaController as BackBerandaController;
use App\Http\Controllers\back\CabangController;
use App\Http\Controllers\back\EditaboutController;
use App\Http\Controllers\back\FooterController;
use App\Http\Controllers\Back\KategoriController;
use App\Http\Controllers\front\ArtikelController;
use App\Http\Controllers\front\ArtikelHomeController;
use App\Http\Controllers\front\KategoriController as FrontKategoriController;
use App\Http\Controllers\front\TampilArtikelController;
use App\Http\Controllers\Back\GaleriController;
use App\Http\Controllers\back\LaporanController;
use App\Http\Controllers\back\LaporanKeuanganController;
use App\Http\Controllers\back\PenggunaController;
use App\Http\Controllers\back\ProgramController;
use App\Http\Controllers\back\TampilAbout;
use App\Http\Controllers\front\AboutController;
use App\Http\Controllers\front\BerandaController;
use App\Http\Controllers\front\GaleriController as FrontGaleriController;
use App\Http\Controllers\front\LaporanKegiatanController;
use App\Http\Controllers\GaleriController as ControllersGaleriController;
use App\Http\Controllers\SesionCOntroller;
use App\Http\Middleware\CekAdmin;
use App\Http\Middleware\CekMember;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('front.dashboard.index');
// });

Route::get('/', [BerandaController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::resource('/galeriadmin', GaleriController::class);
    Route::resource('/artikeladmin', ArtikelController::class);
    Route::get('/Dashboardadmin', [AdminController::class, 'index']);
    Route::resource('/laporan', LaporanController::class);

    Route::resource('/kategoriadmin', KategoriController::class)->only([
        'index', 'store', 'update', 'destroy'
    ]);
    // Route::get('/logout', [SesionCOntroller::class, 'logout']);
    Route::get('/logout', [SesionController::class, 'logout'])->name('logout');
    Route::resource('/profile', PenggunaController::class)->only(['edit', 'update']);

    Route::get('laporan/{id}/keuangan/create', [LaporanKeuanganController::class, 'create'])->name('laporan.keuangan.create');
    Route::post('laporan/{id}/keuangan', [LaporanKeuanganController::class, 'store'])->name('laporan.keuangan.store');
    Route::get('laporan/{id}', [LaporanKeuanganController::class, 'show'])->name('laporan.show');
    Route::get('laporan/{laporanId}/keuangan/edit', [LaporanKeuanganController::class, 'edit'])->name('laporan.keuangan.edit');
    //cobadulu
    Route::put('/laporan/{laporanId}/keuangan', [LaporanKeuanganController::class, 'update'])->name('laporan.keuangan.update');
    Route::delete('/laporan/keuangan/{id}', [LaporanKeuanganController::class, 'destroy'])->name('laporan.keuangan.destroy');
    //endcobadulu
    // Route::put('laporan/{laporanId}/keuangan', [LaporanKeuanganController::class, 'update'])->name('laporan.keuangan.update');
    Route::delete('/laporan-keuangan/{id}', [LaporanKeuanganController::class, 'destroy'])->name('laporan-keuangan.destroy');
    Route::patch('/laporan/{id}/selesai', [LaporanController::class, 'markAsSelesai'])->name('laporan.selesai');
    Route::get('laporan/cetak/{id}', [LaporanController::class, 'cetak'])->name('laporan.cetak');
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::middleware(['auth', CekMember::class])->group(function () {
    Route::resource('/pengguna', PenggunaController::class);
    Route::resource('/cabang', CabangController::class)->only([
        'index', 'store', 'update', 'destroy'
    ]);
    Route::resource('/berandaadmin', BackBerandaController::class);
    Route::resource('/programadmin', ProgramController::class);
    Route::resource('/editabout', TampilAbout::class);
    Route::resource('/editmediasocial', FooterController::class);
});

Route::get('/Artikel', [ArtikelHomeController::class, 'index']);
Route::post('/Artikel/search', [ArtikelHomeController::class, 'index']);
Route::get('/p/{slug}', [TampilArtikelController::class, 'show']);
Route::get('kategori/{slug}', [FrontKategoriController::class, 'index']);
Route::resource('/galeri', FrontGaleriController::class);
Route::resource('/about', AboutController::class);
Route::post('/galeri/search', [FrontGaleriController::class, 'index']);
Route::get('/Agenda', [LaporanKegiatanController::class, 'index']);
Route::post('/Agenda/search', [LaporanKegiatanController::class, 'index']);
Route::get('/KegiatanSelesai', [LaporanKegiatanController::class, 'Labselesai']);
Route::post('/KegiatanSelesai/search', [LaporanKegiatanController::class, 'Labselesai']);
Route::get('Kegiatan/cetak/{slug}', [LaporanKegiatanController::class, 'cetak'])->name('kegiatan.cetak');

Route::middleware(['guest'])->group(function () {
    Route::get('/adlogsalimah', [SesionCOntroller::class, 'index'])->name('login');
    Route::post('/adlogsalimah', [SesionCOntroller::class, 'login']);
});

Route::get('/home', function () {
    return redirect('/Dashboardadmin');
});
