<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::orderBy('created_at', 'desc');

        // Jika ada keyword pencarian
        if ($request->has('q') && $request->q != '') {
            $query->where('nama', 'like', '%' . $request->q . '%');
        }

        $siswas = $query->paginate(25);
        $siswas->appends($request->only('q')); // menjaga query saat pagination

        $data = [
            'title' => 'Data Siswa',
            'siswas' => $siswas
        ];

        return view('pages.siswa.index', $data);
    }

    public function detail($id)
    {
        $title = 'Detail Siswa';
        $siswa = Siswa::with(['nilai.kelas', 'kelas'])->findOrFail($id);

        $rapotOptions = [];

        foreach ($siswa->nilai as $n) {
            if (!$n->kelas || !$n->jenis_nilai || !$n->semester) continue;

            $key = "{$n->jenis_nilai}-{$n->kelas->tingkat}-{$n->semester}";

            if (!isset($rapotOptions[$key])) {
                $rapotOptions[$key] = [
                    'jenis_nilai' => $n->jenis_nilai,
                    'tingkat' => $n->kelas->tingkat,
                    'semester' => $n->semester,
                    'kelas_id' => $n->kelas->id,
                ];
            }

            dd($rapotOptions); // <- debug hanya akan menampilkan satu iterasi lalu berhenti
        }

        return view('pages.siswa.detail', compact('siswa', 'rapotOptions', 'title'));
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

    // Generate rapot
    public function generateRapot(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'jenis' => 'required|in:harian,uts,uas',
            'tingkat' => 'required|in:1,2,3,4,5,6',
            'semester' => 'required|in:Ganjil,Genap',
        ]);

        $jenis = $request->jenis;
        $tingkat = $request->tingkat;
        $semester = $request->semester;

        $nilaiList = Nilai::with('mapel')
            ->where('siswa_id', $siswa->id)
            ->where('jenis', $jenis)
            ->where('semester', $semester)
            ->whereHas('mapel', function ($q) use ($tingkat) {
                $q->where('tingkat', $tingkat);
            })
            ->get();

        if ($nilaiList->isEmpty()) {
            return back()->with('error', 'Tidak ada nilai untuk kriteria yang dipilih.');
        }

        $pdf = Pdf::loadView('pdf.rapot', [
            'siswa' => $siswa,
            'nilaiList' => $nilaiList,
            'jenis' => $jenis,
            'tingkat' => $tingkat,
            'semester' => $semester,
        ]);

        return $pdf->download("Rapot_{$siswa->nama}_{$jenis}_Kelas{$tingkat}_{$semester}.pdf");
    }
}
