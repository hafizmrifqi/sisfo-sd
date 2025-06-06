@extends('layouts.app')
@section('content')
<div
    class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
>
    <div>
        <h3 class="fw-bold mb-3">Tambah Data Kelas</h3>
    </div>
</div>
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
            @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama">Nama Kelas</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nama_kelas"
                                    placeholder="Masukan nama kelas"
                                    name="nama_kelas"
                                    value="{{ old('nama_kelas', $kelas->nama_kelas) }}"
                                />
                                <small id="nama_kelas" class="form-text text-muted"
                                    >Nama kelas seperti (1A, 1B, atau 2A)</small
                                >
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tingkat">Tingkat / Kelas</label>
                                <select class="form-select form-control" id="tingkat" name="tingkat">
                                    <option>-- Pilih Tingkat / Kelas --</option>
                                    <option value="1" {{ $kelas->tingkat == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $kelas->tingkat == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $kelas->tingkat == '3' ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ $kelas->tingkat == '4' ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ $kelas->tingkat == '5' ? 'selected' : '' }}>5</option>
                                    <option value="6" {{ $kelas->tingkat == '6' ? 'selected' : '' }}>6</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="wali_kelas">Pilih Wali Kelas</label>
                                <select name="wali_kelas_id" id="wali_kelas_id" class="form-select" required>
                                    <option value="">-- Pilih Wali Kelas --</option>
                                    @foreach ($guru as $item)
                                        <option value="{{ $item->id }}" {{ old('wali_kelas_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
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
                                    placeholder="Masukian tahun ajaran kelas"
                                    name="tahun_ajaran"
                                    value="{{ old('tahun_ajaran', $kelas->tahun_ajaran) }}"
                                />
                                <small id="tahun_ajaran" class="form-text text-muted"
                                    >Tahun Ajaran Kelas</small
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

