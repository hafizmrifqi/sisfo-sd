@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Tambah Kurikulum</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="{{ route('kurikulum.index') }}" class="btn btn-warning btn-round">Kembali</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('kurikulum.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_kurikulum">Nama Kurikulum</label>
                        <input type="text" name="nama_kurikulum" class="form-control @error('nama_kurikulum') is-invalid @enderror" value="{{ old('nama_kurikulum') }}" required>
                        @error('nama_kurikulum')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="versi">Versi</label>
                        <input type="text" name="versi" class="form-control @error('versi') is-invalid @enderror" value="{{ old('versi') }}" required>
                        @error('versi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="struktur">Struktur (Opsional)</label>
                        <textarea name="struktur" class="form-control @error('struktur') is-invalid @enderror" rows="5" placeholder="Masukkan deskripsi struktur">{{ old('struktur') }}</textarea>
                        @error('struktur')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
