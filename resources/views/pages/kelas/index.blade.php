@extends('layouts.app')
@section('content')
<div
    class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
>
    <div>
        <h3 class="fw-bold mb-3">Data Kelas</h3>
        <a href="{{ url('kelas/tambah') }}" class="btn btn-primary mb-3">Tambah Data Kelas</a>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <!-- Table -->
        <table id="kelasTable" class="display table table-bordered table-responsive" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Tahun Ajaran</th>
                    <th>Wali Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelases as $key => $kelas)
                <tr>
                    <td>{{ $loop->iteration + ($kelases->perPage() * ($kelases->currentPage() - 1)) }}</td>
                    <td>{{ $kelas->nama_kelas }}</td>
                    <td>{{ $kelas->tahun_ajaran }}</td>
                    <td>{{ $kelas->walas_id}}</td>
                    <td class="d-flex">
                        <a href="{{ route('kelas.edit', $kelas->id) }}" class="btn btn-sm btn-warning m-1">Edit</a>
                        <a href="{{ route('kelas.delete', $kelas->id) }}" class="btn btn-sm btn-danger m-1" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                        <a href="{{ route('kelas.detail', $kelas->id) }}" class="btn btn-sm btn-success m-1">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginasi -->
        <div class="d-flex justify-content-center">
            {{ $kelases->links() }}
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#kelasTable').DataTable({
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
