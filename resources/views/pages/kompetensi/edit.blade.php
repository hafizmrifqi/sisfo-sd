@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Edit Kompetensi</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="{{ route('kompetensi.index') }}" class="btn btn-warning btn-round">Kembali</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('kompetensi.update', $kompetensi->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="kode_kompetensi">Kode Kompetensi</label>
                        <input type="text" name="kode_kompetensi" class="form-control @error('kode_kompetensi') is-invalid @enderror" value="{{ old('kode_kompetensi', $kompetensi->kode_kompetensi) }}" required>
                        @error('kode_kompetensi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_kompetensi">Nama Kompetensi</label>
                        <input type="text" name="nama_kompetensi" class="form-control @error('nama_kompetensi') is-invalid @enderror" value="{{ old('nama_kompetensi', $kompetensi->nama_kompetensi) }}" required>
                        @error('nama_kompetensi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="mapel_id">Mata Pelajaran</label>
                        <select name="mapel_id" class="form-control @error('mapel_id') is-invalid @enderror" required>
                            <option value="">Pilih Mata Pelajaran</option>
                            @foreach ($mapel as $m)
                                <option value="{{ $m->id }}" {{ old('mapel_id', $kompetensi->mapel_id) == $m->id ? 'selected' : '' }}>{{ $m->nama_mapel }}</option>
                            @endforeach
                        </select>
                        @error('mapel_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="5">{{ old('deskripsi', $kompetensi->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
