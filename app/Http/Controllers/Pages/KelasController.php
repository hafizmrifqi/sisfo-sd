<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with('walas')->orderBy('created_at', 'desc')->paginate(15);

        $data = [
            'title' => 'Data Kelas',
            'kelases' => $kelas,
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
        $kelas = Kelas::with('siswa')->findOrFail($id);

        $data = [
            'title' => 'Detail Kelas',
            'kelas' => $kelas,
        ];

        // Logika untuk menampilkan detail kelas
        return view('pages.kelas.detail', $data);
    }

    public function addAction(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:100',
            'tingkat' => 'required|in:1,2,3,4,5,6', // Pastikan tingkat sesuai dengan yang diinginkan
            'wali_kelas_id' => 'nullable|exists:gurus,id',
            'tahun_ajaran' => 'required|digits:4',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'tingkat' => $request->tingkat,
            'wali_kelas_id' => $request->wali_kelas_id,
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        $guru = Guru::all(); // atau where dosen => role guru

        $data = [
            'title' => 'Edit Kelas',
            'kelas' => $kelas,
            'guru' => $guru, // Daftar guru untuk pilihan wali kelas
        ];

        // Logika untuk menampilkan form edit kelas
        return view('pages.kelas.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:100',
            'tingkat' => 'required|in:1,2,3,4,5,6', // Pastikan tingkat sesuai dengan yang diinginkan
            'wali_kelas_id' => 'nullable|exists:gurus,id',
            'tahun_ajaran' => 'required|digits:4',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'tingkat' => $request->tingkat,
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

    // Fungsi untuk menambahkan siswa ke kelas
    public function anggota($id)
    {
        // Ambil data kelas beserta siswa yang sudah terdaftar
        $kelas = Kelas::with('siswa')->findOrFail($id);

        // Ambil semua siswa yang belum terdaftar di kelas ini
        $semuaSiswa = Siswa::whereDoesntHave('kelas', function ($query) use ($id) {
            $query->where('kelas.id', $id);
        })->get();

        $title = 'Anggota Kelas ' . $kelas->nama_kelas;

        return view('pages.kelas.anggota', compact('kelas', 'semuaSiswa', 'title'));
    }

    public function tambahSiswa(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
        ]);

        // Cari kelas berdasarkan ID
        $kelas = Kelas::findOrFail($id);

        // Periksa apakah siswa sudah ada di kelas ini
        if ($kelas->siswa->contains($request->siswa_id)) {
            return back()->with('error', 'Siswa sudah terdaftar di kelas ini.');
        }

        // Tambahkan siswa ke kelas
        $kelas->siswa()->attach($request->siswa_id);

        return back()->with('success', 'Siswa berhasil ditambahkan ke kelas.');
    }

    /**
     * Menghapus siswa dari kelas
     */
    public function hapusSiswa($id, $siswaId)
    {
        // Cari kelas berdasarkan ID
        $kelas = Kelas::findOrFail($id);

        // Hapus siswa dari kelas
        $kelas->siswa()->detach($siswaId);

        return back()->with('success', 'Siswa berhasil dihapus dari kelas.');
    }

    public function cetakPdf($id)
    {
        $kelas = Kelas::with(['siswa', 'walas'])->findOrFail($id); // pastikan relasi guru dan siswa sudah didefinisikan

        $pdf = Pdf::loadView('pdf.kelas', compact('kelas'))->setPaper('a4', 'portrait');

        return $pdf->stream('anggota-kelas-' . $kelas->nama_kelas . '.pdf');
    }
}

