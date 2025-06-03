<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        // $mapels = Mapel::orderBy('created_at', 'desc')->paginate(15);
        $mapels = Mapel::with('guru')->orderBy('created_at', 'desc')->paginate(15);

        $data = [
            'title' => 'Mata Pelajaran',
            'mapels' => $mapels,
        ];

        return view('pages.mapel.index', $data);
    }

    public function add()
    {
        $guru = Guru::all();

        $data = [
            'title' => 'Tambah Mata Pelajaran',
            'guru' => $guru, // Daftar guru untuk pilihan
        ];

        return view('pages.mapel.add', $data);
    }

    public function addAction(Request $request)
    {
        $request->validate([
            'kode_mapel' => 'nullable|string|max:10|unique:mapels,kode_mapel',
            'nama_mapel' => 'required|string|max:100',
            'deskripsi' => 'nullable|string|max:255',
            'tingkat' => 'required|in:1,2,3,4,5,6',
            'guru_id' => 'nullable|exists:gurus,id',
        ]);

        Mapel::create($request->all());

        return redirect()->route('mapel.index')->with('success', 'Mata Pelajaran berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);

        $data = [
            'title' => 'Edit Mata Pelajaran',
            'mapel' => $mapel,
        ];

        return view('pages.mapel.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $mapel = Mapel::findOrFail($id);

        $request->validate([
            'kode_mapel' => 'nullable|string|max:10|unique:mapels,kode_mapel,' . $mapel->id,
            'nama_mapel' => 'required|string|max:100',
            'deskripsi' => 'nullable|string|max:255',
            'tingkat' => 'required|in:1,2,3,4,5,6',
            'guru_id' => 'nullable|exists:gurus,id',
        ]);

        $mapel->update($request->all());

        return redirect()->route('mapel.index')->with('success', 'Mata Pelajaran berhasil diperbarui.');
    }
    public function delete($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        return redirect()->route('mapel.index')->with('success', 'Mata Pelajaran berhasil dihapus.');
    }

    public function detail($id)
    {
        $mapel = Mapel::findOrFail($id);

        $data = [
            'title' => 'Detail Mata Pelajaran',
            'mapel' => $mapel,
        ];

        return view('pages.mapel.detail', $data);
    }

}
