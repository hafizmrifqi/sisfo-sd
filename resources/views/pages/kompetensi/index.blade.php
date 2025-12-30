@extends('layouts.app')
@section('content')
<div
    class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
>
    <div>
        <h3 class="fw-bold mb-3">Data Kompetensi</h3>
        <a href="{{ url('kompetensi/tambah') }}" class="btn btn-primary mb-3">Tambah Kompetensi</a>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <!-- Table -->
        <table id="kompetensiTable" class="display table table-bordered table-responsive" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Kompetensi</th>
                    <th>Nama Kompetensi</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kompetensis as $key => $kompetensi)
                <tr>
                    <td>{{ $loop->iteration + ($kompetensis->perPage() * ($kompetensis->currentPage() - 1)) }}</td>
                    <td>{{ $kompetensi->kode_kompetensi }}</td>
                    <td>{{ $kompetensi->nama_kompetensi}}</td>
                    <td>{{ $kompetensi->deskripsi }}</td>
                    <td class="d-flex">
                        <a href="{{ route('kompetensi.edit', $kompetensi->id) }}" class="btn btn-sm btn-warning m-1">Edit</a>
                        <a href="{{ route('kompetensi.delete', $kompetensi->id) }}" class="btn btn-sm btn-danger m-1" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginasi -->
        <div class="d-flex justify-content-center">
            {{ $kompetensis->links() }}
        </div>
    </div>
</div>

@endsection
