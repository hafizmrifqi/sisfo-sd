@extends('layouts.app')
@section('content')
<div
    class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
>
    <div>
        <h3 class="fw-bold mb-3">Tambah Data Nilai</h3>
    </div>
</div>
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
            @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="siswa_id">Pilih Siswa</label>
                                    <select name="siswa_id" id="siswa_id" class="form-select" required>
                                        <option value="belum">-- Pilih Siswa --</option>
                                        @foreach ($siswa as $item)
                                            <option value="{{ $item->id }}" {{ old('siswa_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="mapel_id">Pilih Mata Pelajaran</label>
                                <select name="mapel_id" id="mapel_id" class="form-select" required>
                                    <option value="belum">-- Pilih Mata Pelajaran --</option>
                                    @foreach ($mapel as $item)
                                        <option value="{{ $item->id }}" {{ old('mapel_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama_mapel }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="jenis">Jenis Nilai</label>
                                <select class="form-select form-control" id="jenis" name="jenis">
                                    <option>-- Pilih Jenis --</option>
                                    <option value="harian" {{ $nilai->jenis == 'harian' ? 'selected' : '' }}>Ulangan Harian</option>
                                    <option value="uts" {{ $nilai->jenis == 'uts' ? 'selected' : '' }}>UTS</option>
                                    <option value="uas" {{ $nilai->jenis == 'uas' ? 'selected' : '' }}>UAS</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nilai">Nilai</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nilai"
                                    placeholder="contoh: 85"
                                    name="nilai"
                                    value="{{ old('nilai', $nilai->nilai) }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="semester">Semester</label>
                                <select class="form-select form-control" id="semester" name="semester">
                                    <option>-- Pilih Semester --</option>
                                    <option value="ganjil" {{ $nilai->semester == 'ganjil' ? 'selected' : '' }}>Ganjil</option>
                                    <option value="genap" {{ $nilai->semester == 'genap' ? 'selected' : '' }}>Genap</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tahun_ajaran">Tahun Ajaran</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="tahun_ajaran"
                                    placeholder="contoh: 2025"
                                    name="tahun_ajaran"
                                    value="{{ old('tahun_ajaran', $nilai->tahun_ajaran) }}"
                                />
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

