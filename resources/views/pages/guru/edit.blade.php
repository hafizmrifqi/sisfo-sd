@extends('layouts.app')
@section('content')
<div
    class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
>
    <div>
        <h3 class="fw-bold mb-3">Edit Data Guru - <?= $guru['nama']; ?></h3>
    </div>
</div>
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <form action="{{ route('guru.update', $guru->id) }}" method="POST">
            @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nip"
                                    placeholder="Masukian NIP"
                                    name="nip"
                                    value="{{ old('nip', $guru->nip) }}"
                                />
                                <small id="nip" class="form-text text-muted"
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
                                    placeholder="Masukian Nama Guru"
                                    name="nama"
                                    value="{{ old('nama', $guru->nama) }}"
                                />
                                <small id="nama" class="form-text text-muted"
                                    >Nama panjang guru</small
                                >
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-select form-control" id="jenis_kelamin" name="jenis_kelamin">
                                    <option>-- Pilih Jenis Kelamin</option>
                                    <option value="L" {{ $guru->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki - laki</option>
                                    <option value="P" {{ $guru->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
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
                                    placeholder="Masukian kota tempat lahir"
                                    name="tempat_lahir"
                                    value="{{ old('tempat_lahir', $guru->tempat_lahir) }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    id="tanggal_lahir"
                                    placeholder="Masukian tanggal lahir"
                                    name="tanggal_lahir"
                                    value="{{ old('tanggal_lahir', $guru->tanggal_lahir) }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="alamat"
                                    placeholder="Masukian alamat"
                                    name="alamat"
                                    value="{{ old('alamat', $guru->alamat) }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="no_hp">No. Handphone</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="no_hp"
                                    placeholder="Masukian nomer"
                                    name="no_hp"
                                    value="{{ old('no_hp', $guru->no_hp) }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="email"
                                    placeholder="Masukan Email"
                                    name="email"
                                    value="{{ old('email', $guru->email) }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-select form-control" id="status" name="status">
                                    <option>-- Pilih Status --</option>
                                    <option value="aktif" {{ $guru->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="nonaktif" {{ $guru->status == 'nonaktif' ? 'selected' : '' }}>Non Aktif</option>
                                </select>
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

