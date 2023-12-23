<?php

use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SewaAlatController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.landing');
});

Route::get('/berita', function () {
    return view('pages.berita');
})->name('berita');

Route::get('/tentang-kami', function () {
    return view('pages.tentang-kami');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* ---------------------------------------------------------------------
     | PROTECTED ROUTES
     | ---------------------------------------------------------------------
     */
    Route::prefix('layanan')->group(function () {
        Route::get('/', [LayananController::class, 'index'])->name('layanan');

        Route::name('sewa-alat.')
            ->prefix('sewa-alat')
            ->controller(SewaAlatController::class)
            ->group(function () {
                Route::get('/', 'index')->name('sewa-alat'); // index halaman sewa alat
                Route::get('/{alat}/permohonan', 'list')->name('sewa-alat-list'); // list permohonan sewa alat
                Route::get('/{alat}/permohonan/{id}', 'single')->name('sewa-alat-single'); // mendapatkan satu data permohonan
                Route::get('/{alat}/permohonan/tambah', 'create')->name('sewa-alat-create'); // menampilkan form permohonan sewa alat
                Route::post('/{alat}/permohonan/tambah', 'store')->name('sewa-alat-store'); // submit permohonan sewa alat
                Route::put('/{alat}/permohonan/{id}/ubah', 'update')->name('sewa-alat-update'); // ubaha data permohonan by id
                Route::put('/{alat}/permohonan/{id}/hapus', 'delete')->name('sewa-alat-delete'); // hapus data permohonan by id
            });

        Route::get('/konsultasi', function () {
            return view('pages.layanan.konsultasi');
        })->name('konsultasi');

        Route::get('/klaim-asuransi', function () {
            return view('pages.layanan.klaim-asuransi');
        })->name('klaim-asuransi');

        Route::get('/peta-sebaran', function () {
            return view('pages.layanan.peta-sebaran');
        })->name('peta-sebaran');
    });
});

require __DIR__ . '/auth.php';
