@extends('layouts.auth')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white text-center">
                    {{ __('Login') }}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" name="remember" id="remember" class="form-check-input"
                                   {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember" class="form-check-label">Remember Me</label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    Don't have an account? <a href="{{ route('register') }}">Register here</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
