<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index(Request $request)
    {
        $query = Nilai::with(['siswa', 'mapel'])->orderBy('created_at', 'desc');

        // Jika ada keyword pencarian berdasarkan nama siswa
        if ($request->has('q') && $request->q != '') {
            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->q . '%');
            });
        }

        $nilais = $query->paginate(25);
        $nilais->appends($request->only('q'));

        $data = [
            'title' => 'Nilai Siswa',
            'nilais' => $nilais
        ];

        return view('pages.nilai.index', $data);
    }

    public function add()
    {
        $siswa = Siswa::all();
        $mapel = Mapel::all();
        $kelas = Kelas::all(); // Ambil semua kelas untuk dropdown

        return view('pages.nilai.add', [
            'title' => 'Tambah Nilai Siswa',
            'siswa' => $siswa,
            'mapel' => $mapel,
            'kelas' => $kelas,
        ]);
    }

    public function addAction(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'mapel_id' => 'required|exists:mapels,id',
            'kelas_id' => 'required|exists:kelas,id',
            'nilai' => 'required|numeric|min:0|max:100',
            'jenis' => 'required|in:harian,uts,uas',
            'semester' => 'nullable|string|max:20',
            'tahun_ajaran' => 'nullable|integer|min:2000|max:' . (date('Y') + 1),
        ]);

        Nilai::create([
            'siswa_id' => $request->siswa_id,
            'mapel_id' => $request->mapel_id,
            'kelas_id' => $request->kelas_id, // Simpan kelas_id
            'nilai' => $request->nilai,
            'jenis' => $request->jenis,
            'semester' => $request->semester,
            'tahun_ajaran' => $request->tahun_ajaran ?: date('Y'),
        ]);

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $nilai = Nilai::with('siswa', 'mapel', 'kelas')->findOrFail($id);
        $siswa = Siswa::all();
        $mapel = Mapel::all();
        $kelas = Kelas::all();

        return view('pages.nilai.edit', [
            'title' => 'Edit Nilai Siswa',
            'nilai' => $nilai,
            'siswa' => $siswa,
            'mapel' => $mapel,
            'kelas' => $kelas,
        ]);
    }

    public function update(Request $request, $id)
    {
        $nilai = Nilai::findOrFail($id);

        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'mapel_id' => 'required|exists:mapels,id',
            'kelas_id' => 'required|exists:kelas,id',
            'nilai' => 'required|numeric|min:0|max:100',
            'jenis' => 'required|in:harian,uts,uas',
            'semester' => 'nullable|string|max:20',
            'tahun_ajaran' => 'nullable|integer|min:2000|max:' . (date('Y') + 1),
        ]);

        $nilai->update([
            'siswa_id' => $request->siswa_id,
            'mapel_id' => $request->mapel_id,
            'kelas_id' => $request->kelas_id, // Update kelas_id
            'nilai' => $request->nilai,
            'jenis' => $request->jenis,
            'semester' => $request->semester,
            'tahun_ajaran' => $request->tahun_ajaran ?: date('Y'),
        ]);

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil diperbarui.');
    }
}
