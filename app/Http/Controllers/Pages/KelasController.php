<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Kelas',
        ];

        // Logika untuk menampilkan daftar kelas
        return view('pages.kelas.index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Kelas',
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
            'deskripsi' => 'nullable|string|max:255',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'wali_kelas_id' => $request->wali_kelas_id,
            'tahun_ajaran' => $request->tahun_ajaran,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }
}
