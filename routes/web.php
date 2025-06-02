<?php
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Pages\GuruController;
use App\Http\Controllers\Pages\KelasController;
use App\Http\Controllers\Pages\SiswaController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected route example
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/', [PagesController::class, 'index'])->name('index');

    // Siswa
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/detail/{id}', [SiswaController::class, 'detail'])->name('siswa.detail');
    Route::get('/siswa/tambah', [SiswaController::class, 'add'])->name('siswa.add');
    Route::post('/siswa/simpan', [SiswaController::class, 'addAction'])->name('siswa.store');
    Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::post('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::get('/siswa/delete/{id}', [SiswaController::class, 'delete'])->name('siswa.delete');

    // Guru
    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::get('/guru/detail/{id}', [GuruController::class, 'detail'])->name('guru.detail');
    Route::get('/guru/tambah', [GuruController::class, 'add'])->name('guru.add');
    Route::post('/guru/simpan', [GuruController::class, 'addAction'])->name('guru.store');
    Route::get('/guru/edit/{id}', [GuruController::class, 'edit'])->name('guru.edit');
    Route::post('/guru/update/{id}', [GuruController::class, 'update'])->name('guru.update');
    Route::get('/guru/delete/{id}', [GuruController::class, 'delete'])->name('guru.delete');

    // Kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/kelas/detail/{id}', [KelasController::class, 'detail'])->name('kelas.detail');
    Route::get('/kelas/tambah', [KelasController::class, 'add'])->name('kelas.add');
    Route::post('/kelas/simpan', [KelasController::class, 'addAction'])->name('kelas.store');
    Route::get('/kelas/edit/{id}', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::post('/kelas/update/{id}', [KelasController::class, 'update'])->name('kelas.update');
    Route::get('/kelas/delete/{id}', [KelasController::class, 'delete'])->name('kelas.delete');

    // Tambah siswa ke kelas
    Route::get('/kelas/{id}/anggota', [KelasController::class, 'anggota'])->name('kelas.anggota');
    Route::post('/kelas/{id}/tambah-siswa', [KelasController::class, 'tambahSiswa'])->name('kelas.tambah.siswa');
    Route::delete('/kelas/{id}/hapus-siswa/{siswaId}', [KelasController::class, 'hapusSiswa'])->name('kelas.hapus.siswa');
});
