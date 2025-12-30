<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kompetensi;
use App\Models\Mapel;

class KompetensiController extends Controller
{
    public function index()
    {
        $kompetensis = Kompetensi::paginate(10);

        $data = [
            'kompetensis' => $kompetensis,
            'title' => 'Data Kompetensi',
        ];
        return view('pages.kompetensi.index', $data);
    }

    public function create()
    {
        $mapel = Mapel::all();
        $data = [
            'title' => 'Tambah Kompetensi',
            'mapel' => $mapel
        ];
        return view('pages.kompetensi.add', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kompetensi' => 'required|string|max:50|unique:kompetensis,kode_kompetensi',
            'nama_kompetensi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'mapel_id' => 'required|exists:mapels,id',
        ]);

        Kompetensi::create([
            'kode_kompetensi' => $request->kode_kompetensi,
            'nama_kompetensi' => $request->nama_kompetensi,
            'deskripsi' => $request->deskripsi,
            'mapel_id' => $request->mapel_id,
        ]);

        return redirect()->route('kompetensi.index')->with('success', 'Kompetensi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kompetensi = Kompetensi::findOrFail($id);
        $mapel = Mapel::all();
        $data = [
            'title' => 'Edit Kompetensi',
            'kompetensi' => $kompetensi,
            'mapel' => $mapel
        ];
        return view('pages.kompetensi.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $kompetensi = Kompetensi::findOrFail($id);
        
        $request->validate([
            'kode_kompetensi' => 'required|string|max:50|unique:kompetensis,kode_kompetensi,' . $kompetensi->id,
            'nama_kompetensi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'mapel_id' => 'required|exists:mapels,id',
        ]);

        $kompetensi->update([
            'kode_kompetensi' => $request->kode_kompetensi,
            'nama_kompetensi' => $request->nama_kompetensi,
            'deskripsi' => $request->deskripsi,
            'mapel_id' => $request->mapel_id,
        ]);

        return redirect()->route('kompetensi.index')->with('success', 'Kompetensi berhasil diperbarui.');
    }

    public function delete($id)
    {
        $kompetensi = Kompetensi::findOrFail($id);
        $kompetensi->delete();

        return redirect()->route('kompetensi.index')->with('success', 'Kompetensi berhasil dihapus.');
    }
}
