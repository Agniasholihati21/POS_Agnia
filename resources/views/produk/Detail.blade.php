
@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')

@include('layouts.navbar')

<style>
  @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

  body {
    background-color: #f0f3f8;
    color: #2d3748;
    font-family: 'Plus Jakarta Sans', sans-serif;
  }

  /* Header Section */
  .page-header {
    background: linear-gradient(135deg, #1e1e38 0%, #2a2a50 100%);
    color: #ffffff;
    padding: 1.8rem;
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(30, 30, 56, 0.15);
    margin-bottom: 2rem;
  }

  /* Main Card Detail Container */
  .detail-card {
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.04);
    border: 1px solid #e2e8f0;
    overflow: hidden;
    max-width: 900px;
    margin: 0 auto;
  }

  /* Product Image Styling */
  .product-img-wrapper {
    background-color: #f8fafc;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1.5rem;
    min-height: 300px;
    border-right: 1px solid #f1f5f9;
  }

  .product-img-wrapper img {
    max-height: 320px;
    width: 100%;
    object-fit: contain;
    border-radius: 12px;
    transition: transform 0.3s ease;
  }

  .product-img-wrapper img:hover {
    transform: scale(1.03);
  }

  /* Info Section Styling */
  .product-info {
    padding: 2rem;
  }

  .product-title {
    font-size: 1.6rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 1.2rem;
  }

  .info-group {
    background-color: #f8fafc;
    border-radius: 12px;
    padding: 1.2rem;
    margin-bottom: 1.5rem;
  }

  .info-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.6rem 0;
    border-bottom: 1px dashed #e2e8f0;
  }

  .info-item:last-child {
    border-bottom: none;
  }

  .info-label {
    font-size: 0.85rem;
    font-weight: 600;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .info-value {
    font-size: 1rem;
    font-weight: 700;
    color: #334155;
  }

  .price-buy {
    color: #0284c7;
  }

  .price-sell {
    color: #16a34a;
    font-size: 1.2rem;
  }

  /* Stock Badge */
  .badge-stock {
    background-color: #dcfce7;
    color: #15803d;
    border: 1px solid #bbf7d0;
    padding: 4px 12px;
    border-radius: 20px;
    font-weight: 700;
  }

  .badge-stock-low {
    background-color: #fef3c7;
    color: #b45309;
    border: 1px solid #fde68a;
    padding: 4px 12px;
    border-radius: 20px;
    font-weight: 700;
  }

  /* Buttons */
  .btn-back {
    background-color: #f1f5f9;
    color: #64748b;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    padding: 0.7rem 1.5rem;
    font-weight: 600;
    transition: all 0.2s ease;
    text-decoration: none;
    display: inline-block;
  }

  .btn-back:hover {
    background-color: #e2e8f0;
    color: #334155;
  }

  .btn-edit {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    color: white;
    border: none;
    border-radius: 10px;
    padding: 0.7rem 1.5rem;
    font-weight: 600;
    box-shadow: 0 4px 12px rgba(245, 158, 11, 0.2);
    transition: all 0.2s ease;
    text-decoration: none;
  }

  .btn-edit:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(245, 158, 11, 0.3);
    color: white;
  }
</style>

<div class="container my-4">
  <div class="page-header d-flex justify-content-between align-items-center flex-wrap">
    <div>
      <h2 class="fw-bold m-0">🔍 Detail Produk</h2>
      <p class="text-white-50 m-0 mt-1">Informasi lengkap rincian produk dan inventaris</p>
    </div>
    <a href="{{ route('produk.index') }}" class="btn btn-back mt-2 mt-md-0">
      ← Kembali Ke Daftar
    </a>
  </div>

  <div class="detail-card">
    <div class="row g-0 align-items-center">
      <div class="col-md-5">
        <div class="product-img-wrapper">
          @if($produk->foto)
            <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama }}">
          @else
            <div class="text-center text-muted">
              <span style="font-size: 3rem;">📦</span>
              <p class="mb-0 mt-2">Tidak ada foto produk</p>
            </div>
          @endif
        </div>
      </div>

      <div class="col-md-7">
        <div class="product-info">
          <span class="badge bg-primary-subtle text-primary fw-semibold px-3 py-1 rounded-pill mb-2">
            ID Produk: #{{ $produk->id }}
          </span>
          <h3 class="product-title">{{ $produk->nama }}</h3>

          <div class="info-group">
            <div class="info-item">
              <span class="info-label">Harga Dasar (Beli)</span>
              <span class="info-value price-buy">Rp {{ number_format($produk->harga_beli, 0, ',', '.') }}</span>
            </div>

            <div class="info-item">
              <span class="info-label">Harga Jual</span>
              <span class="info-value price-sell">Rp {{ number_format($produk->harga_jual, 0, ',', '.') }}</span>
            </div>

            <div class="info-item">
              <span class="info-label">Sisa Stok</span>
              <span class="info-value">
                @if($produk->stok > 5)
                  <span class="badge-stock">{{ $produk->stok }} pcs</span>
                @else
                  <span class="badge-stock-low">⚠️ {{ $produk->stok }} pcs</span>
                @endif
              </span>
            </div>

            <div class="info-item">
              <span class="info-label">Penginput Data</span>
              <span class="info-value text-secondary">
                👤 {{ $produk->user->name ?? 'Sistem' }}
              </span>
            </div>
          </div>

          <div class="d-flex gap-2">
            <a href="{{ route('produk.index') }}" class="btn btn-back">
              Kembali
            </a>
            @if(Route::has('produk.edit'))
              <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-edit">
                ✏️ Edit Produk
              </a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

```