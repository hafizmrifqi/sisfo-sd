<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::orderBy('created_at', 'desc')->paginate(15);

        $data = [
            'title' => 'Data Guru',
            'gurus' => $gurus
        ];

        return view('pages.guru.index', $data);
    }

    public function detail($id)
    {
        // Ambil data
        $guru = Guru::findOrFail($id);

        $data = [
            'title' => 'Detail Guru',
            'guru' => $guru
        ];

        return view('pages.guru.detail', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Data Guru'
        ];

        return view('pages.guru.add', $data);
    }

    public function addAction(Request $request)
    {
        // Validasi input
        $request->validate([
            'nip'           => 'required|string|max:20',
            'nama'          => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir'  => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'alamat'        => 'nullable|string|max:255',
            'no_hp'         => 'nullable|string|max:20',
            'email'         => 'nullable|email|max:100',
            'foto'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status'        => 'required|in:aktif,nonaktif'
        ]);

        // Simpan data ke database
        Guru::create([
            'nip'           => $request->nip,
            'nama'          => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat'        => $request->alamat,
            'no_hp'         => $request->no_hp,
            'email'         => $request->email,
            'foto'          => 'guru.png', // Default foto, bisa diubah sesuai upload
            'status'        => $request->status
        ]);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Ambil data
        $guru = Guru::findOrFail($id);

        $data = [
            'title' => 'Edit Data Guru',
            'guru' => $guru
        ];

        return view('pages.guru.edit', $data);
    }

    public function editAction(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nip'           => 'required|string|max:20',
            'nama'          => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir'  => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'alamat'        => 'nullable|string|max:255',
            'no_hp'         => 'nullable|string|max:20',
            'email'         => 'nullable|email|max:100',
            'foto'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status'        => 'required|in:aktif,nonaktif'
        ]);

        // Update data ke database
        $guru = Guru::findOrFail($id);
        $guru->update($request->all());

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui.');
    }

    public function delete($id)
    {
        // Hapus data
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $gurus = Guru::where('nama', 'like', '%' . $keyword . '%')
            ->orWhere('nip', 'like', '%' . $keyword . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $data = [
            'title' => 'Hasil Pencarian Guru',
            'gurus' => $gurus,
            'keyword' => $keyword
        ];

        return view('pages.guru.index', $data);
    }

    public function exportExcel()
    {
        return (new \App\Exports\GuruExport)->download('data_guru.xlsx');
    }

    public function exportPdf()
    {
        $gurus = Guru::orderBy('created_at', 'desc')->get();

        $data = [
            'title' => 'Data Guru',
            'gurus' => $gurus
        ];

        $pdf = \PDF::loadView('pages.guru.export_pdf', $data);
        return $pdf->download('data_guru.pdf');
    }

    public function importExcel(Request $request)
    {
        // Validasi file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        // Proses import
        \Excel::import(new \App\Imports\GuruImport, $request->file('file'));

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diimpor.');
    }
}
