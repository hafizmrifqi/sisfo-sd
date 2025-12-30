@extends('layouts.app')
@section('content')
<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
        <h3 class="fw-bold mb-3">Data Kurikulum</h3>
        <a href="{{ route('kurikulum.create') }}" class="btn btn-primary mb-3">Tambah Kurikulum</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- Table -->
        <table id="kurikulumTable" class="display table table-bordered table-responsive" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kurikulum</th>
                    <th>Versi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kurikulums as $key => $kurikulum)
                <tr>
                    <td>{{ $loop->iteration + ($kurikulums->perPage() * ($kurikulums->currentPage() - 1)) }}</td>
                    <td>{{ $kurikulum->nama_kurikulum }}</td>
                    <td>{{ $kurikulum->versi }}</td>
                    <td class="d-flex">
                        <a href="{{ route('kurikulum.edit', $kurikulum->id) }}" class="btn btn-sm btn-warning m-1">Edit</a>
                        <a href="{{ route('kurikulum.delete', $kurikulum->id) }}" class="btn btn-sm btn-danger m-1" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginasi -->
        <div class="d-flex justify-content-center">
            {{ $kurikulums->links() }}
        </div>
    </div>
</div>
@endsection
