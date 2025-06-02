<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::orderBy('created_at', 'desc')->paginate(15);

        $data = [
            'title' => 'Data Kelas',
            'kelases' => $kelas
        ];

        // Logika untuk menampilkan daftar kelas
        return view('pages.kelas.index', $data);
    }

    public function add()
    {
        $guru = Guru::all(); // atau where dosen => role guru

        $data = [
            'title' => 'Tambah Kelas',
            'guru' => $guru, // Daftar guru untuk pilihan wali kelas
        ];

        // Logika untuk menampilkan form tambah kelas
        return view('pages.kelas.add', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Kelas',
            'kelas' => $id, // Ganti dengan logika untuk mengambil data kelas berdasarkan ID
        ];

        // Logika untuk menampilkan detail kelas
        return view('pages.kelas.detail', $data);
    }

    public function addAction(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:100',
            'wali_kelas_id' => 'nullable|exists:gurus,id',
            'tahun_ajaran' => 'required|digits:4',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'wali_kelas_id' => $request->wali_kelas_id,
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);

        $data = [
            'title' => 'Edit Kelas',
            'kelas' => $kelas,
        ];

        // Logika untuk menampilkan form edit kelas
        return view('pages.kelas.edit', $data);
    }

    public function editAction(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:100',
            'wali_kelas_id' => 'nullable|exists:gurus,id',
            'tahun_ajaran' => 'required|digits:4',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'wali_kelas_id' => $request->wali_kelas_id,
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    public function delete($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }

    public function tambahSiswa(Request $request, $id)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
        ]);

        $kelas = Kelas::findOrFail($id);

        // Cek apakah siswa sudah ada di kelas ini
        if ($kelas->siswa->contains($request->siswa_id)) {
            return back()->with('error', 'Siswa sudah terdaftar di kelas ini.');
        }

        // Tambahkan siswa ke kelas
        $kelas->siswa()->attach($request->siswa_id);

        return back()->with('success', 'Siswa berhasil ditambahkan ke kelas.');
    }

    public function anggota($id)
    {
        $kelas = Kelas::with('siswa')->findOrFail($id);

        // Ambil semua siswa yang belum terdaftar di kelas ini
        $semuaSiswa = Siswa::whereDoesntHave('kelas', function ($query) use ($id) {
            $query->where('kelas.id', $id);
        })->get();

        return view('kelas.detail', compact('kelas', 'semuaSiswa'));
    }
}

