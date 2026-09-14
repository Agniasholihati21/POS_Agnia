@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4 p-md-5">

            <!-- Title Header -->
            <h3 class="fw-bold mb-3" style="color: #e78d9b;">Tentang {{ $appInfo->name }}</h3>
            
            <!-- Deskripsi Aplikasi -->
            <p class="text-secondary lead fs-6 mb-4" style="line-height: 1.8;">
                {!! preg_replace('/(Point of Sale \(POS\))/', '<strong>$1</strong>', e($appInfo->description)) !!}
            </p>

            <!-- Teknologi yang Digunakan -->
            <h4 class="fw-bold mb-3 mt-4" style="color: #e78d9b;">Teknologi yang Digunakan</h4>
            <div class="row g-3 mb-4">
                @foreach ($appInfo->technologies as $label => $value)
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 border-start border-4" style="border-color: #e78d9b !important;">
                            <span class="d-block fw-bold text-dark mb-1">{{ $label }}</span>
                            <span class="text-secondary">{{ $value }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Fitur Aplikasi -->
            <h4 class="fw-bold mb-3 mt-4" style="color: #e78d9b;">Fitur Aplikasi</h4>
            <ul class="list-unstyled text-secondary mb-4">
                @foreach ($appInfo->features as $feature)
                    <li class="mb-2 d-flex align-items-center">
                        <span class="me-2 text-danger">•</span>
                        <span>{{ $feature }}</span>
                    </li>
                @endforeach
            </ul>

            <!-- Tombol Kembali & Hak Cipta -->
            <div class="text-center mt-5 pt-3 border-top">
                <a href="{{ route('Beranda') }}" class="btn text-white px-4 py-2 rounded-pill shadow-sm fw-bold mb-3" style="background-color: #e78d9b;">
                    ← Kembali ke Beranda
                </a>
                <p class="text-muted small mb-0">© {{ date('Y') }} {{ $appInfo->author }} - Aplikasi Point of Sale</p>
            </div>

        </div>
    </div>
</div>
@endsection