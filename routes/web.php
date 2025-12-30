<?php
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Pages\GuruController;
use App\Http\Controllers\Pages\KelasController;
use App\Http\Controllers\Pages\MapelController;
use App\Http\Controllers\Pages\RapotController;
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

    Route::get('/kelas/{id}/pdf', [KelasController::class, 'cetakPdf'])->name('kelas.cetak.pdf');

    // Mata Pelajaran
    Route::get('/mapel', [MapelController::class, 'index'])->name('mapel.index');
    Route::get('/mapel/tambah', [MapelController::class, 'add'])->name('mapel.add');
    Route::post('/mapel/simpan', [MapelController::class, 'addAction'])->name('mapel.store');
    Route::get('/mapel/edit/{id}', [MapelController::class, 'edit'])->name('mapel.edit');
    Route::post('/mapel/update/{id}', [MapelController::class, 'update'])->name('mapel.update');
    Route::get('/mapel/delete/{id}', [MapelController::class, 'delete'])->name('mapel.delete');

    // Nilai
    Route::get('/nilai', [App\Http\Controllers\Pages\NilaiController::class, 'index'])->name('nilai.index');
    Route::get('/nilai/tambah', [App\Http\Controllers\Pages\NilaiController::class, 'add'])->name('nilai.add');
    Route::post('/nilai/simpan', [App\Http\Controllers\Pages\NilaiController::class, 'addAction'])->name('nilai.store');
    Route::get('/nilai/edit/{id}', [App\Http\Controllers\Pages\NilaiController::class, 'edit'])->name('nilai.edit');
    Route::post('/nilai/update/{id}', [App\Http\Controllers\Pages\NilaiController::class, 'update'])->name('nilai.update');
    Route::get('/nilai/delete/{id}', [App\Http\Controllers\Pages\NilaiController::class, 'delete'])->name('nilai.delete');

    Route::get('/siswa/{id}/generate-rapot', [SiswaController::class, 'generateRapot'])->name('siswa.generateRapot');

    // Absen
    Route::get('/absen', [App\Http\Controllers\Pages\AbsenController::class, 'index'])->name('absen.index');
    Route::post('/absen/simpan', [App\Http\Controllers\Pages\AbsenController::class, 'addAction'])->name('absen.store');
    Route::get('/absen/edit/{id}', [App\Http\Controllers\Pages\AbsenController::class, 'edit'])->name('absen.edit');
    Route::get('/absen/detail/{id}', [App\Http\Controllers\Pages\AbsenController::class, 'detail'])->name('absen.detail');
    Route::post('/absen/update/{id}', [App\Http\Controllers\Pages\AbsenController::class, 'update'])->name('absen.update');
    Route::get('/absen/delete/{id}', [App\Http\Controllers\Pages\AbsenController::class, 'delete'])->name('absen.delete');
    Route::get('/absen/delete/{id}', [App\Http\Controllers\Pages\AbsenController::class, 'delete'])->name('absen.delete');

    // Kompetensi
    Route::get('/kompetensi', [App\Http\Controllers\Pages\KompetensiController::class, 'index'])->name('kompetensi.index');
    Route::get('/kompetensi/tambah', [App\Http\Controllers\Pages\KompetensiController::class, 'create'])->name('kompetensi.create');
    Route::post('/kompetensi/simpan', [App\Http\Controllers\Pages\KompetensiController::class, 'store'])->name('kompetensi.store');
    Route::get('/kompetensi/edit/{id}', [App\Http\Controllers\Pages\KompetensiController::class, 'edit'])->name('kompetensi.edit');
    Route::post('/kompetensi/update/{id}', [App\Http\Controllers\Pages\KompetensiController::class, 'update'])->name('kompetensi.update');
    Route::get('/kompetensi/delete/{id}', [App\Http\Controllers\Pages\KompetensiController::class, 'delete'])->name('kompetensi.delete');

    // Kurikulum
    Route::get('/kurikulum', [App\Http\Controllers\Pages\KurikulumController::class, 'index'])->name('kurikulum.index');
    Route::get('/kurikulum/tambah', [App\Http\Controllers\Pages\KurikulumController::class, 'create'])->name('kurikulum.create');
    Route::post('/kurikulum/simpan', [App\Http\Controllers\Pages\KurikulumController::class, 'store'])->name('kurikulum.store');
    Route::get('/kurikulum/edit/{id}', [App\Http\Controllers\Pages\KurikulumController::class, 'edit'])->name('kurikulum.edit');
    Route::post('/kurikulum/update/{id}', [App\Http\Controllers\Pages\KurikulumController::class, 'update'])->name('kurikulum.update');
    Route::get('/kurikulum/delete/{id}', [App\Http\Controllers\Pages\KurikulumController::class, 'delete'])->name('kurikulum.delete');
});

// Superadmin Only Routes
Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/users', [App\Http\Controllers\Pages\UsersController::class, 'index'])->name('users.index');
    Route::get('/users/tambah', [App\Http\Controllers\Pages\UsersController::class, 'create'])->name('users.create');
    Route::post('/users/simpan', [App\Http\Controllers\Pages\UsersController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}', [App\Http\Controllers\Pages\UsersController::class, 'edit'])->name('users.edit');
    Route::post('/users/update/{id}', [App\Http\Controllers\Pages\UsersController::class, 'update'])->name('users.update');
    Route::get('/users/delete/{id}', [App\Http\Controllers\Pages\UsersController::class, 'delete'])->name('users.delete');
});
