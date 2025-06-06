@extends('layouts.app')
@section('content')
<div
    class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
>
    <div>
        <h3 class="fw-bold mb-3">Data Siswa - {{ $siswa->nama }}</h3>
        <a href="{{ url('siswa/edit', $siswa->id) }}" class="btn btn-primary mb-3">Edit Data</a>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="col-md-4">
                    <img src="{{ asset('assets/img/profile.png') }}" alt="" style="max-width: 200px">
                </div>
                <div class="col-md8">

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                unch
            </div>
        </div>
    </div>
</div>


@endsection
