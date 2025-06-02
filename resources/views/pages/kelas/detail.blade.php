@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Anggota Kelas: {{ $kelas->nama_kelas }}</h3>

    <!-- Form Tambah Siswa -->
    <form action="{{ route('kelas.tambah.siswa', $kelas->id) }}" method="POST" class="mb-4">
        @csrf
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <label for="siswa_id" class="visually-hidden">Pilih Siswa</label>
                <select name="siswa_id" id="siswa_id" class="form-select" required>
                    <option value="">-- Pilih Siswa --</option>
                    @foreach($semuaSiswa as $siswa)
                        <option value="{{ $siswa->id }}">{{ $siswa->nama_siswa }} ({{ $siswa->nis }})</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Tambah Siswa</button>
            </div>
        </div>
    </form>

    <!-- Daftar Anggota Kelas -->
    <h5>Daftar Siswa dalam Kelas Ini:</h5>
    @if ($kelas->siswa->isEmpty())
        <p class="text-muted">Belum ada siswa ditambahkan.</p>
    @else
        <ul class="list-group">
            @foreach ($kelas->siswa as $siswa)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $siswa->nama_siswa }} ({{ $siswa->nis }})
                    <form action="{{ route('kelas.hapus.siswa', [$kelas->id, $siswa->id]) }}" method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus siswa ini dari kelas?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
