@extends('layouts.template')

{{-- Menetapkan judul halaman --}}
@section('title', 'Login')

{{-- Menambahkan CSS khusus untuk halaman ini, disalin dari halaman profil --}}
@push('styles')
<style>
    /* Latar belakang utama halaman yang lebih lembut */
    body {
        background-color: #f8f9fa;
        color: #212529;
    }

    /* Kustomisasi untuk kartu/panel form login */
    .login-card {
        background-color: #ffffff;
        border: 1px solid #dee2e6;
        border-radius: 0.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    /* Kustomisasi untuk input fields agar sesuai dengan aksen */
    .form-control:focus {
        border-color: #ffc107;
        box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25);
    }

    .form-label {
        font-weight: 600;
    }

    /* Tombol utama dengan warna emas */
    .btn-gold {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #212529;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 0.75rem 1.5rem; /* Dibuat sedikit lebih besar untuk tombol utama */
    }
    .btn-gold:hover {
        background-color: #e0a800;
        border-color: #d39e00;
        color: #212529;
    }

    /* Kustomisasi untuk link "Forgot Password" */
    .forgot-password-link {
        font-size: 0.9rem;
    }
</style>
@endpush


@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5 col-xl-4">

            {{-- Kartu Form Login --}}
            <div class="login-card p-4 p-md-5">

                {{-- Header Form --}}
                <div class="text-center mb-4">
                    <h3 class="fw-bold">{{ __('Welcome Back!') }}</h3>
                    <p class="text-muted">{{ __('Please log in to continue.') }}</p>
                </div>

                @if (session('status'))
                    <div class="alert alert-success mb-4" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                         @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                            <label class="form-check-label" for="remember_me">
                                {{ __('Remember me') }}
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="forgot-password-link text-decoration-none" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-gold">
                            {{ __('Log In') }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
