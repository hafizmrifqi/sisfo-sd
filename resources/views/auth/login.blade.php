@extends('layouts.auth')

@section('content')
<div class="container-fluid p-0 overflow-hidden">
    <div class="row g-0" style="min-height: 100vh;">
        <!-- Side Sight (Left Side with Image) -->
        <div class="col-lg-7 d-none d-lg-block side-sight position-relative">
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: url('{{ asset('assets/img/bg-404.jpeg') }}') no-repeat center center / cover;">
                <div class="overlay" style="background: rgba(0,0,0,0.4); position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></div>
                <div class="content position-absolute top-50 start-50 translate-middle text-center text-white p-4">
                    <h1 class="display-4 fw-bold mb-3">Sistem Informasi SD</h1>
                    <p class="lead">Kelola data akademik dan administrasi sekolah dengan mudah dan efisien.</p>
                </div>
            </div>
        </div>

        <!-- Side Form (Right Side with Login Form) -->
        <div class="col-lg-5 d-flex align-items-center justify-content-center side-form bg-white">
            <div class="w-100 p-5 p-lg-5" style="max-width: 500px;">
                <div class="text-center mb-5">
                   <h2 class="fw-bold text-dark">Selamat Datang!</h2>
                   <p class="text-muted">Silahkan login untuk mengakses akun anda</p>
                </div>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="form-label font-weight-bold">Email Address</label>
                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autofocus placeholder="name@example.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label font-weight-bold">Password</label>
                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                               name="password" required placeholder="********">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input type="checkbox" name="remember" id="remember" class="form-check-input"
                                   {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember" class="form-check-label text-muted">Ingat Saya</label>
                        </div>
                        {{-- <a href="#" class="text-primary text-decoration-none">Lupa Password?</a> --}}
                    </div>

                    <div class="d-grid mb-4">
                        <button type="submit" class="btn btn-primary btn-lg fw-bold">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form>

                <div class="text-center text-muted mt-4">
                    Belum punya akun? <a href="{{ route('register') }}" class="fw-bold text-primary text-decoration-none">Daftar sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
