@extends('layouts.app')
@section('content')
<div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
    >
        <div>
            <h3 class="fw-bold mb-3">Dashboard</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div
                                class="icon-big text-center icon-primary bubble-shadow-small"
                            >
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Siswa</p>
                                <h4 class="card-title">
                                    {{ $siswa }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div
                                class="icon-big text-center icon-info bubble-shadow-small"
                            >
                                <i class="fas fa-user-check"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Guru</p>
                                <h4 class="card-title">
                                    {{ $guru }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <h3 class="fw-bold mb-3">Akses Cepat</h3>
        <div class="col-sm-6 col-md-3">
            <a href="/absen" class="btn btn-label-warning btn-round-sm me-2 mb-2">
                <b>Absensi Siswa</b>
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="/nilai" class="btn btn-label-warning btn-round-sm me-2 mb-2">
                <b>Cek Nilai Siswa</b>
            </a>
        </div>
    </div>
@endsection
