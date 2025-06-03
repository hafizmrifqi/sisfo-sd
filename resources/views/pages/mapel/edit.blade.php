@extends('layouts.app')
@section('content')
<div
    class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
>
    <div>
        <h3 class="fw-bold mb-3">Tambah Data Mata Pelajaran</h3>
    </div>
</div>
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <form action="{{ route('mapel.update', $mapel->id) }}" method="POST">
            @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nip">Kode Mapel</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="kode_mapel"
                                    placeholder="Masukan Kode Mapel"
                                    name="kode_mapel"
                                    value="{{ old('kode_mapel', $mapel->kode_mapel) }}"
                                />
                                <small id="kode_mapel" class="form-text text-muted"
                                    >Contoh MTK001, tidak boleh sama dengan yang lain</small
                                >
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama_mapel">Nama Mata Pelajaran</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nama_mapel"
                                    placeholder="Masukan Nama Mata Pelajaran"
                                    name="nama_mapel"
                                    value="{{ old('nama_mapel', $mapel->nama_mapel) }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama_mapel">Deskripsi</label>
                                <input
                                    type="textarea"
                                    class="form-control"
                                    id="deskripsi"
                                    placeholder="Masukian deskripsi mapel *opsional"
                                    name="deskripsi"
                                    value="{{ old('deskripsi', $mapel->deskripsi) }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tingkat">Tingkat / Kelas</label>
                                <select class="form-select form-control" id="tingkat" name="tingkat">
                                    <option>-- Pilih Tingkat / Kelas --</option>
                                    <option value="1" {{ $mapel->tingkat == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $mapel->tingkat == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $mapel->tingkat == '3' ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ $mapel->tingkat == '4' ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ $mapel->tingkat == '5' ? 'selected' : '' }}>5</option>
                                    <option value="6" {{ $mapel->tingkat == '6' ? 'selected' : '' }}>6</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="guru_id">Pilih Pengajar</label>
                                <select name="guru_id" id="guru_id" class="form-select" required>
                                    <option value="belum">-- Pilih Pengajar --</option>
                                    @foreach ($guru as $item)
                                        <option value="{{ $item->id }}" {{ old('guru_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
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

