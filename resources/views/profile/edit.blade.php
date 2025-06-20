@extends('layouts.template')

{{-- Menetapkan judul halaman --}}
@section('title', 'My Profile')

{{-- Menambahkan CSS khusus untuk halaman ini --}}
@push('styles')
<style>
    /* Latar belakang utama halaman yang lebih lembut dari putih murni */
    body {
        background-color: #f8f9fa; /* Warna off-white/light-gray dari Bootstrap */
        color: #212529; /* Warna teks gelap standar */
    }

    /* Kustomisasi untuk kartu/panel form */
    .profile-card {
        background-color: #ffffff; /* Latar kartu putih bersih */
        border: 1px solid #dee2e6; /* Border abu-abu terang */
        border-radius: 0.5rem; /* Sudut yang sedikit lebih tumpul */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05); /* Bayangan lembut untuk efek 'terangkat' */
        transition: all 0.3s ease-in-out;
    }

    /* Judul "eyebrow" setiap bagian form, tetap menggunakan aksen kuning */
    .profile-section-title {
        color: #ffc107;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-weight: 600;
        font-size: 0.9rem;
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
        padding: 0.5rem 1.5rem;
    }
    .btn-gold:hover {
        background-color: #e0a800;
        border-color: #d39e00;
        color: #212529;
    }
</style>
@endpush

{{-- Memulai section konten utama --}}
@section('content')
<div class="container py-5 mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- Header halaman utama --}}
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">{{ __('My Profile') }}</h2>
                <p class="text-muted">{{ __('Manage your account information and privacy settings.') }}</p>
            </div>

            {{-- Panel untuk Update Informasi Profil --}}
            <div class="profile-card p-4 p-md-5 mb-4">
                @include('profile.partials.update-profile-information-form')
            </div>

            {{-- Panel untuk Update Password --}}
            <div class="profile-card p-4 p-md-5 mb-4">
                @include('profile.partials.update-password-form')
            </div>

            {{-- Panel untuk Hapus Akun (Danger Zone) --}}
            <div class="profile-card p-4 p-md-5" style="border-color: #dc3545;">
                @include('profile.partials.delete-user-form')
            </div>

        </div>
    </div>
</div>
@endsection
