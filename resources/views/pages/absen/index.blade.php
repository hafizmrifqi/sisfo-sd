@extends('layouts.app')
@section('content')
<div
    class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
>
    <div>
        <h3 class="fw-bold mb-3">Tambah Data Absen</h3>
    </div>
</div>
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <form action="{{ route('absen.store') }}" method="POST">
            @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="siswa_id">Pilih Siswa</label>
                                <select name="siswa_id" id="siswa_id" class="form-select" required>
                                    <option value="">-- Pilih Siswa --</option>
                                    @foreach ($siswa as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }} | {{ $item->nipd }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    id="tanggal"
                                    placeholder="Masukian tanggal absen"
                                    name="tanggal"
                                    value="{{ date('Y-m-d') }}"
                                />
                                <small id="tanggal" class="form-text text-muted"
                                    >Tanggal absen</small
                                >
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-select form-control" id="status" name="status">
                                    <option>-- Pilih Status --</option>
                                    <option value="izin">Izin</option>
                                    <option value="sakit">Sakit</option>
                                    <option value="alpha">Alpha</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="keterangan"
                                    placeholder="contoh: Sakit Flu"
                                    name="keterangan"
                                />
                                <small id="tempat_lahir" class="form-text text-muted"
                                    >Info tambahan</small
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <button class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-12">
        <!-- Table -->
        <table id="absenTable" class="display table table-bordered table-responsive" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absens as $key => $absen)
                <tr>
                    <td>{{ $loop->iteration + ($absens->perPage() * ($absens->currentPage() - 1)) }}</td>
                    <td>{{ optional($absen->siswa)->nama ?? 'Tidak ada nama siswa' }}</td>
                    <td>{{ $absen->tanggal }}</td>
                    <td>{{ $absen->status }}</td>
                    <td>{{ $absen->keterangan }}</td>
                    <td class="d-flex">
                        <a href="{{ route('absen.delete', $absen->id) }}" class="btn btn-sm btn-danger m-1" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginasi -->
        <div class="d-flex justify-content-center">
            {{ $absens->links() }}
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

