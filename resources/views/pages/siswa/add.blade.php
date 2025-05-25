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
            <form action="{{ route('siswa.store') }}" method="POST">
            @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email2">NIPD</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nipd"
                                    placeholder="Masukian NIPD"
                                />
                                <small id="emailHelp2" class="form-text text-muted"
                                    >Pastikan data sesuai</small
                                >
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email2">Nama</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nama"
                                    placeholder="Masukian Nama Siswa"
                                />
                                <small id="emailHelp2" class="form-text text-muted"
                                    >Nama panjang siswa</small
                                >
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email2">Jenis Kelamin</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="jenis_kelamin"
                                    placeholder="Pilih Jenis Kelamin"
                                />
                                <small id="emailHelp2" class="form-text text-muted"
                                    >Nama panjang siswa</small
                                >
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email2">Nama</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nama"
                                    placeholder="Masukian Na,a Siswa"
                                />
                                <small id="emailHelp2" class="form-text text-muted"
                                    >Nama panjang siswa</small
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

