@extends('layouts.app')
@section('content')
<div
    class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
>
    <div>
        <h3 class="fw-bold mb-3">Tambah Data User</h3>
    </div>
</div>
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <form action="{{ route('users.store') }}" method="POST">
            @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    placeholder="Masukian Nama"
                                    name="name"
                                />
                                <small id="name" class="form-text text-muted"
                                    >Pastikan data sesuai</small
                                >
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="email"
                                    placeholder="Masukian Email"
                                    name="email"
                                />
                                <small id="email" class="form-text text-muted"
                                    >Pastikan data sesuai</small
                                >
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="password"
                                    placeholder="Masukian Password"
                                    name="password"
                                />
                                <small id="password" class="form-text text-muted"
                                    >Pastikan data sesuai</small
                                >
                            </div>  
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-select form-control" id="role" name="role">
                                    <option>-- Pilih Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
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

