@extends('layouts.app')

@section('content')
    <h1>Detail Informasi Siswa</h1>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/img/profile.png') }}" alt="" style="max-width: 200px;">
                        <div class="m-3 p-3">
                            <h2>{{ $siswa->nama }}</h2>
                            <p><strong>NISN:</strong> {{ $siswa->nisn }}</p>
                            <p><strong>Jenis Kelamin:</strong> {{ $siswa->jenis_kelamin }}</p>
                            <p><strong>Tanggal Lahir:</strong> {{ $siswa->tanggal_lahir }}</p>
                            <p><strong>Alamat:</strong> {{ $siswa->alamat }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                <h2>Generate Nilai Rapot</h2>
                </div>
                <form action="{{ route('siswa.generateRapot', $siswa->id) }}" method="GET">
                <div class="card-body">
                    <div class="form-group">
                        <label for="jenis">Jenis Nilai:</label>
                        <select name="jenis" id="jenis" class="form-select form-control">
                            <option value="harian">Harian</option>
                            <option value="uts">UTS</option>
                            <option value="uas">UAS</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tingkat">Tingkat:</label>
                        <select name="tingkat" id="tingkat" class="form-select form-control">
                            @for ($i = 1; $i <= 6; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="semester">Semester:</label>
                        <select name="semester" id="semester" class="form-select form-control">
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                    </div>

                </div>
                <div class="card-action">
                    <button type="submit" class="btn btn-primary">Generate PDF</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
