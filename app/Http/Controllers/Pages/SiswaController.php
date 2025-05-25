<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        // Ambil 25 data siswa per halaman, urut dari yang terbaru
        $siswas = Siswa::orderBy('created_at', 'desc')->paginate(25);

        $data = [
            'title' => 'Data Siswa',
            'siswas' => $siswas
        ];

        return view('pages.siswa.index', $data);
    }

    public function detail($id)
    {
        // ambil data
        $siswa = Siswa::findOrFail($id);

        $data = [
            'title' => 'Detail Siswa',
            'siswa' => $siswa
        ];

        return view('pages.siswa.detail', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Data Siswa'
        ];

        return view('pages.siswa.add', $data);
    }

    public function addAction(Request $request)
    {
        // Validasi input
        $request->validate([
            'nipd'          => 'required|string|max:20',
            'nama'          => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir'  => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'nama_ayah'     => 'nullable|string|max:100',
            'nama_ibu'      => 'nullable|string|max:100',
        ]);

        // Simpan data ke database
        Siswa::create([
            'nipd'          => $request->nipd,
            'nama'          => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nama_ayah'     => $request->nama_ayah,
            'nama_ibu'      => $request->nama_ibu,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);

        $data = [
            'title' => 'Edit Data Siswa',
            'siswa' => $siswa
        ];

        return view('pages.siswa.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nipd'          => 'required|string|max:20',
            'nama'          => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir'  => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'nama_ayah'     => 'nullable|string|max:100',
            'nama_ibu'      => 'nullable|string|max:100',
        ]);

        // Ambil data siswa
        $siswa = Siswa::findOrFail($id);

        // Update data
        $siswa->update([
            'nipd'          => $request->nipd,
            'nama'          => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nama_ayah'     => $request->nama_ayah,
            'nama_ibu'      => $request->nama_ibu,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function delete($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
