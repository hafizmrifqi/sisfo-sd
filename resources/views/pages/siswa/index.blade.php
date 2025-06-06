@extends('layouts.app')
@section('content')
<div
    class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
>
    <div>
        <h3 class="fw-bold mb-3">Data Siswa</h3>
        <a href="{{ url('siswa/tambah') }}" class="btn btn-primary mb-3">Tambah Siswa</a>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <!-- Table -->
        <table id="siswaTable" class="display table table-bordered table-responsive" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIPD</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswas as $key => $siswa)
                <tr>
                    <td>{{ $loop->iteration + ($siswas->perPage() * ($siswas->currentPage() - 1)) }}</td>
                    <td>{{ $siswa->nipd }}</td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>{{ $siswa->tempat_lahir }}</td>
                    <td>{{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d-m-Y') }}</td>
                    <td class="d-flex">
                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-sm btn-warning m-1">Edit</a>
                        <a href="{{ route('siswa.delete', $siswa->id) }}" class="btn btn-sm btn-danger m-1" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                        <a href="{{ route('siswa.detail', $siswa->id) }}" class="btn btn-sm btn-primary m-1">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginasi -->
        <div class="d-flex justify-content-center">
            {{ $siswas->links() }}
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#siswaTable').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        language: {
            search: "Cari:",
            paginate: {
                first: "Pertama",
                last: "Terakhir",
                next: "Selanjutnya",
                previous: "Sebelumnya"
            },
            lengthMenu: "Tampilkan _MENU_ data per halaman",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        }
    });
});
</script>
@endsection
