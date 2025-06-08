<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Absen',
            'siswa' => Siswa::all(),
            'absens' => Absen::orderBy('tanggal', 'desc')->paginate(5), // Ambil 25 data absen per halaman, urut dari yang terbaru
        ];

        return view('pages.absen.index', $data);
    }

    public function addAction(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'tanggal' => 'required|date',
            'status' => 'required|in:izin,sakit,alpha',
            'keterangan' => 'nullable|string|max:255',
        ]);

        // Logika untuk menyimpan data absen
        Absen::create([
            'siswa_id' => $request->siswa_id,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('absen.index')->with('success', 'Data absen berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Absen',
            'id' => $id,
        ];

        return view('pages.absen.edit', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Data Absen',
            'id' => $id,
        ];

        return view('pages.absen.detail', $data);
    }

    public function delete($id)
    {
        // Logika untuk menghapus data absen berdasarkan ID
        Absen::findOrFail($id)->delete();

        return redirect()->route('absen.index')->with('success', 'Data absen berhasil dihapus.');
    }
}
