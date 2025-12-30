<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Kurikulum;

class KurikulumController extends Controller
{
    public function index()
    {
        $kurikulums = Kurikulum::paginate(10);
        $data = [
            'title' => 'Data Kurikulum',
            'kurikulums' => $kurikulums
        ];
        return view('pages.kurikulum.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kurikulum'
        ];
        return view('pages.kurikulum.add', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kurikulum' => 'required|string|max:255',
            'versi' => 'required|string|max:50',
            'struktur' => 'nullable|string', // Assuming simplified input for now
        ]);

        Kurikulum::create([
            'nama_kurikulum' => $request->nama_kurikulum,
            'versi' => $request->versi,
            'struktur' => $request->struktur ? json_encode(['deskripsi' => $request->struktur]) : null, // Simple wrapper or direct save if using cast
        ]);

        return redirect()->route('kurikulum.index')->with('success', 'Kurikulum berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kurikulum = Kurikulum::findOrFail($id);
        $data = [
            'title' => 'Edit Kurikulum',
            'kurikulum' => $kurikulum
        ];
        return view('pages.kurikulum.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $kurikulum = Kurikulum::findOrFail($id);

        $request->validate([
            'nama_kurikulum' => 'required|string|max:255',
            'versi' => 'required|string|max:50',
            'struktur' => 'nullable|string',
        ]);

        $kurikulum->update([
            'nama_kurikulum' => $request->nama_kurikulum,
            'versi' => $request->versi,
            'struktur' => $request->struktur ? json_encode(['deskripsi' => $request->struktur]) : null,
        ]);

        return redirect()->route('kurikulum.index')->with('success', 'Kurikulum berhasil diperbarui.');
    }

    public function delete($id)
    {
        $kurikulum = Kurikulum::findOrFail($id);
        $kurikulum->delete();

        return redirect()->route('kurikulum.index')->with('success', 'Kurikulum berhasil dihapus.');
    }
}
