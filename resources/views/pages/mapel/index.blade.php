@extends('layouts.app')
@section('content')
<div
    class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
>
    <div>
        <h3 class="fw-bold mb-3">Data Mata Pelajaran</h3>
        <a href="{{ url('mapel/tambah') }}" class="btn btn-primary mb-3">Tambah Mata Pelajaran</a>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <!-- Table -->
        <table id="mapelTable" class="display table table-bordered table-responsive" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Mapel</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mapels as $key => $mapel)
                <tr>
                    <td>{{ $loop->iteration + ($mapels->perPage() * ($mapels->currentPage() - 1)) }}</td>
                    <td>{{ $mapel->kode_mapel }}</td>
                    <td>{{ $mapel->nama_mapel}}</td>
                    <td>{{ $mapel->email }}</td>
                    <td>{{ $mapel->tingkat }}</td>
                    <td class="d-flex">
                        <a href="{{ route('mapel.edit', $mapel->id) }}" class="btn btn-sm btn-warning m-1">Edit</a>
                        <a href="{{ route('mapel.delete', $mapel->id) }}" class="btn btn-sm btn-danger m-1" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginasi -->
        <div class="d-flex justify-content-center">
            {{ $gurus->links() }}
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#guruTable').DataTable({
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
