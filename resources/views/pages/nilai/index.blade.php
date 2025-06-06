@extends('layouts.app')
@section('content')
<div
    class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
>
    <div>
        <h3 class="fw-bold mb-3">Data Nilai</h3>
        <a href="{{ url('nilai/tambah') }}" class="btn btn-primary mb-3">Tambah Data Nilai</a>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <!-- Table -->
        <table id="nilaiTable" class="display table table-bordered table-responsive" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Mata Pelajaran</th>
                    <th>Nilai</th>
                    <th>Jenis</th>
                    <th>Kelas</th>
                    <th>Semester</th>
                    <th>Tahun Ajaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nilais as $key => $nilai)
                <tr>
                    <td>{{ $loop->iteration + ($nilais->perPage() * ($nilais->currentPage() - 1)) }}</td>
                    <td>{{ optional($nilai->siswa)->nama ?? 'Tidak ada nama siswa' }}</td>
                    <td>{{ optional($nilai->mapel)->nama_mapel ?? 'Tidak ada nama mapel' }}</td>
                    <td>{{ $nilai->nilai }}</td>
                    <td>{{ $nilai->jenis }}</td>
                    <td>{{ optional($nilai->mapel)->tingkat ?? 'Tidak ada nama mapel' }}</td>
                    <td>{{ $nilai->semester }}</td>
                    <td>{{ $nilai->tahun_ajaran }}</td>
                    <td class="d-flex">
                        <a href="{{ route('nilai.edit', $nilai->id) }}" class="btn btn-sm btn-warning m-1">Edit</a>
                        <a href="{{ route('nilai.delete', $nilai->id) }}" class="btn btn-sm btn-danger m-1" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginasi -->
        <div class="d-flex justify-content-center">
            {{ $nilais->links() }}
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#nilaiTable').DataTable({
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
