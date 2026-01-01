@extends('layouts.app')

@section('title', 'Anggota Kelas')

@section('content')
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h3>Anggota Kelas: {{ $kelas->nama_kelas }}</h3>

                <!-- Pesan Sukses/Error -->
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <!-- Form Tambah Siswa -->
                <form action="{{ route('kelas.tambah.siswa', $kelas->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="siswa_id" class="form-label">Pilih Siswa</label>
                        <select name="siswa_id" id="siswa_id" class="form-select" required>
                            <option value="">-- Pilih Siswa --</option>
                            @foreach ($semuaSiswa as $siswa)
                                <option value="{{ $siswa->id }}">{{ $siswa->nama }} ({{ $siswa->nisn }})</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Siswa</button>
                </form>
            </div>
        </div>

    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <!-- Daftar Anggota Kelas -->
                <h5 class="mt-1">Daftar Siswa dalam Kelas Ini:</h5>
                @if ($kelas->siswa->isEmpty())
                    <p class="text-muted">Belum ada siswa ditambahkan.</p>
                @else
                    <ul class="list-group">
                        @foreach ($kelas->siswa as $siswa)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $siswa->nama }} ({{ $siswa->nisn }})
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
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5>Alat Laporan :</h5>
                <a href="{{ route('kelas.cetak.pdf', $kelas->id) }}" target="_blank" class="btn btn-secondary">Cetak PDF</a>
            </div>
        </div>
    </div>
</div>

<script>
    new TomSelect('#siswa_id', {
        create: false,
        placeholder: "-- Pilih Siswa --",
        allowEmptyOption: true
    });
</script>
@endsection
