@extends('layouts.app')
@section('content')
<div
    class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
>
    <div>
        <h3 class="fw-bold mb-3">Tambah Data Siswa</h3>
    </div>
</div>
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
            @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nipd">NIPD</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nipd"
                                    placeholder="Masukian NIPD"
                                    name="nipd"
                                    value="{{ old('nipd', $siswa->nipd) }}"
                                />
                                <small id="nipd" class="form-text text-muted"
                                    >Pastikan data sesuai</small
                                >
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nama"
                                    placeholder="Masukian Nama Siswa"
                                    name="nama"
                                    value="{{ old('nama', $siswa->nama) }}"
                                />
                                <small id="nama" class="form-text text-muted"
                                    >Nama panjang siswa</small
                                >
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-select form-control" id="jenis_kelamin" name="jenis_kelamin">
                                    <option>-- Pilih Jenis Kelamin</option>
                                    <option value="L" {{ $siswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ $siswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="tempat_lahir"
                                    placeholder="Masukian kota tempat lahir siswa"
                                    name="tempat_lahir"
                                    value="{{ old('tempat_lahir', $siswa->tempat_lahir) }}"
                                />
                                <small id="tempat_lahir" class="form-text text-muted"
                                    >Tempat lahir siswa</small
                                >
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    id="tanggal_lahir"
                                    placeholder="Masukian tanggal lahir siswa"
                                    name="tanggal_lahir"
                                    value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}"
                                />
                                <small id="tanggal_lahir" class="form-text text-muted"
                                    >Tanggal lahir siswa</small
                                >
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama">Nama Ayah</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nama_ayah"
                                    placeholder="Masukian Nama Ayah Siswa"
                                    name="nama_ayah"
                                    value="{{ old('nama_ayah', $siswa->nama_ayah) }}"
                                />
                                <small id="nama_ayah" class="form-text text-muted"
                                    >Nama ayah siswa</small
                                >
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama">Nama Ibu</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nama ibu"
                                    placeholder="Masukian Nama Ibu Siswa"
                                    name="nama_ibu"
                                    value="{{ old('nama_ibu', $siswa->nama_ibu) }}"
                                />
                                <small id="nama_ibu" class="form-text text-muted"
                                    >Nama ibu siswa</small
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
</div>
@endsection

