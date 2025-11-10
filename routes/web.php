<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\GuruDashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MasterGuruController;
use App\Http\Controllers\MasterUserController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\JamController;
use App\Http\Controllers\TahunPelajaranController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\AbsenController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ============ GUEST (Belum Login) ============
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::get('/', function () {
    return redirect('/login');
});

// ============ ADMIN ROUTES ============
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    // Dashboard admin
    Route::get('/dashboard', [DasboardController::class, 'index'])->name('dashboard');

    Route::get('/user', [MasterUserController::class, 'index'])->name('user.index');
    Route::get('/user/tambah-user', [MasterUserController::class, 'create'])->name('user.create');
    Route::post('/user/store-user', [MasterUserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [MasterUserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}/update', [MasterUserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [MasterUserController::class, 'destroy'])->name('user.destroy');

    Route::get('/guru', [MasterGuruController::class, 'index'])->name('guru.index');
    Route::get('/guru/tambah-guru', [MasterGuruController::class, 'create'])->name('guru.create');
    Route::post('/guru/store-guru', [MasterGuruController::class, 'store'])->name('guru.store');
    Route::get('/guru/{id}/edit', [MasterGuruController::class, 'edit'])->name('guru.edit');
    Route::put('/guru/{id}', [MasterGuruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/{id}', [MasterGuruController::class, 'destroy'])->name('guru.destroy');

    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/kelas/tambah-kelas', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('/kelas/store-kelas', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/kelas/{id}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('/kelas/{id}/update', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');

    Route::get('/ruang', [RuangController::class, 'index'])->name('ruang.index');
    Route::get('/ruang/tambah-ruang', [RuangController::class, 'create'])->name('ruang.create');
    Route::post('/ruang/store-ruang', [RuangController::class, 'store'])->name('ruang.store');
    Route::get('/ruang/{id}/edit', [RuangController::class, 'edit'])->name('ruang.edit');
    Route::put('/ruang/{id}/update', [RuangController::class, 'update'])->name('ruang.update');
    Route::delete('/ruang/{id}', [RuangController::class, 'destroy'])->name('ruang.destroy');

    Route::get('/jam', [JamController::class, 'index'])->name('jam.index');
    Route::get('/jam/tambah-jam', [JamController::class, 'create'])->name('jam.create');
    Route::post('/jam/store-jam', [JamController::class, 'store'])->name('jam.store');
    Route::get('/jam/{id}/edit', [JamController::class, 'edit'])->name('jam.edit');
    Route::put('/jam/{id}/update', [JamController::class, 'update'])->name('jam.update');
    Route::delete('/jam/{id}', [JamController::class, 'destroy'])->name('jam.destroy');

    Route::get('/mata_pelajaran', [MataPelajaranController::class, 'index'])->name('mata_pelajaran.index');
    Route::get('/mata_pelajaran/tambah-mata_pelajaran', [MataPelajaranController::class, 'create'])->name('mata_pelajaran.create');
    Route::post('/mata_pelajaran/store-mata_pelajaran', [MataPelajaranController::class, 'store'])->name('mata_pelajaran.store');
    Route::get('/mata_pelajaran/{id}/edit', [MataPelajaranController::class, 'edit'])->name('mata_pelajaran.edit');
    Route::put('/mata_pelajaran/{id}/update', [MataPelajaranController::class, 'update'])->name('mata_pelajaran.update');
    Route::delete('/mata_pelajaran/{id}', [MataPelajaranController::class, 'destroy'])->name('mata_pelajaran.destroy');

    Route::get('/tahun_pelajaran', [TahunPelajaranController::class, 'index'])->name('tahun_pelajaran.index');
    Route::get('/tahun_pelajaran/tambah-tahun_pelajaran', [TahunPelajaranController::class, 'create'])->name('tahun_pelajaran.create');
    Route::post('/tahun_pelajaran/store-tahun_pelajaran', [TahunPelajaranController::class, 'store'])->name('tahun_pelajaran.store');
    Route::get('/tahun_pelajaran/{id}/edit', [TahunPelajaranController::class, 'edit'])->name('tahun_pelajaran.edit');
    Route::put('/tahun_pelajaran/{id}/update', [TahunPelajaranController::class, 'update'])->name('tahun_pelajaran.update');
    Route::delete('/tahun_pelajaran/{id}', [TahunPelajaranController::class, 'destroy'])->name('tahun_pelajaran.destroy');


    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
    Route::get('/jadwal/tambah-jadwal', [JadwalController::class, 'create'])->name('jadwal.create');
    Route::get('/jadwal/detail-jadwal/{id}', [JadwalController::class, 'show'])->name('jadwal.show');
    Route::post('/jadwal/store-jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
    Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::put('/jadwal/{id}/update', [JadwalController::class, 'update'])->name('jadwal.update');
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');
});


// ============ GURU ROUTES ============
Route::middleware(['auth', 'role:guru'])->prefix('guru')->group(function () {
    
    Route::get('/dashboard', [GuruDashboardController::class, 'index'])->name('guru.dashboard');

    
    Route::get('/guru/absen', [AbsenController::class, 'index'])->name('absen.index');
    Route::post('/guru/absen/datang', [AbsenController::class, 'absenDatang'])->name('absen.datang');
    Route::post('/guru/absen/pulang', [AbsenController::class, 'absenPulang'])->name('absen.pulang');

});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
