@extends('layouts.app') {{-- Sesuaikan dengan nama master layout utama kamu --}}

@section('content')
<div class="container py-5">
    <!-- Header Section (Profil Perusahaan) -->
    <div class="row justify-content-center text-center mb-5">
        <div class="col-lg-8">
            <div class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill mb-3">
                <i class="bi bi-flower1 me-1"></i> Perusahaan & Florist Profesional
            </div>
            <h1 class="fw-bold text-dark display-5 mb-3">Tentang <span style="color: #e78d9b;">Bouquet POS</span></h1>
            <p class="text-muted lead">
                Kami adalah penyedia layanan florist profesional yang menghadirkan keindahan Rangkaian Bunga Segar untuk setiap momen berharga Anda. Didukung oleh sistem operasional modern untuk memastikan kualitas produk dan pelayanan terbaik bagi seluruh pelanggan.
            </p>
        </div>
    </div>

    <!-- Keunggulan Perusahaan / Layanan Utama -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 p-3 hover-card">
                <div class="card-body">
                    <div class="feature-icon bg-light text-danger rounded-3 mb-3 d-inline-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="bi bi-patch-check fs-4" style="color: #e78d9b;"></i>
                    </div>
                    <h5 class="fw-bold">Bunga Segar Berkualitas</h5>
                    <p class="text-muted small">
                        Kami menjamin setiap tangkai bunga dipetik dari perkebunan terbaik dan dirawat secara profesional agar tetap segar hingga ke tangan Anda.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 p-3 hover-card">
                <div class="card-body">
                    <div class="feature-icon bg-light text-danger rounded-3 mb-3 d-inline-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="bi bi-palette fs-4" style="color: #e78d9b;"></i>
                    </div>
                    <h5 class="fw-bold">Rangkaian Kustom</h5>
                    <p class="text-muted small">
                        Melayani pembuatan buket kustom untuk acara pernikahan, wisuda, ulang tahun, hingga momen spesial sesuai keinginan dan budget Anda.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 p-3 hover-card">
                <div class="card-body">
                    <div class="feature-icon bg-light text-danger rounded-3 mb-3 d-inline-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="bi bi-heart fs-4" style="color: #e78d9b;"></i>
                    </div>
                    <h5 class="fw-bold">Pelayanan Tepat Waktu</h5>
                    <p class="text-muted small">
                        Komitmen kami adalah memberikan pengalaman berbelanja yang responsif, rapi, dan pengiriman yang selalu tepat pada waktunya.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Kembali ke Dashboard -->
    <div class="text-center">
        <a href="{{ route('Beranda') }}" class="btn text-white rounded-pill px-4 py-2" style="background-color: #e78d9b;">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
        </a>
    </div>
</div>

<style>
.hover-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.hover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(231, 141, 155, 0.2) !important;
}
</style>
@endsection