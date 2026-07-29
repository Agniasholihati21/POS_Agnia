@extends('layouts.app')

@section('title', 'Detail Penjualan')

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

  /* Card Container */
  .content-card {
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.04);
    padding: 1.8rem;
    border: 1px solid #e2e8f0;
    margin-bottom: 2rem;
  }

  /* Summary Card Styling */
  .summary-card {
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 1.5rem;
  }

  .summary-item {
    display: flex;
    flex-direction: column;
  }

  .summary-label {
    font-size: 0.8rem;
    font-weight: 700;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.25rem;
  }

  .summary-value {
    font-size: 1.1rem;
    font-weight: 700;
    color: #1e293b;
  }

  .total-price {
    color: #10b981;
    font-size: 1.5rem;
  }

  /* Product Thumbnail */
  .product-thumb {
    width: 55px;
    height: 55px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #e2e8f0;
  }

  /* Table Custom Styling */
  .table-custom thead {
    background-color: #f8fafc;
  }

  .table-custom thead th {
    border: none;
    color: #64748b;
    font-weight: 700;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 14px 12px;
  }

  .table-custom tbody tr {
    transition: background-color 0.2s ease;
  }

  .table-custom tbody tr:hover {
    background-color: #f1f5f9;
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
  }

  .btn-back:hover {
    background-color: #e2e8f0;
    color: #334155;
  }
</style>

<div class="container my-4">
  <div class="page-header d-flex justify-content-between align-items-center flex-wrap">
    <div>
      <h2 class="fw-bold m-0">🧾 Detail Penjualan</h2>
      <p class="text-white-50 m-0 mt-1">Rincian transaksi dan item yang dibeli</p>
    </div>
    <a href="{{ route('penjualan.index') }}" class="btn btn-back mt-2 mt-md-0">
      ← Kembali
    </a>
  </div>

  <div class="content-card">
    <h5 class="fw-bold mb-3 text-dark">Ringkasan Transaksi</h5>
    <div class="summary-card">
      <div class="row g-3">
        <div class="col-md-4">
          <div class="summary-item">
            <span class="summary-label">Kasir</span>
            <span class="summary-value">👤 {{ $sale->user->name ?? 'Sistem' }}</span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="summary-item">
            <span class="summary-label">Tanggal Transaksi</span>
            <span class="summary-value">📅 {{ $sale->created_at->translatedFormat('d-m-Y H:i:s') }}</span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="summary-item">
            <span class="summary-label">Total Pembayaran</span>
            <span class="summary-value total-price">Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content-card">
    <h5 class="fw-bold mb-3 text-dark">Daftar Produk Dibeli</h5>
    <div class="table-responsive">
      <table class="table table-custom align-middle">
        <thead>
          <tr>
            <th scope="col" style="width: 5%;">#</th>
            <th scope="col" class="text-center" style="width: 10%;">Foto</th>
            <th scope="col">Nama Produk</th>
            <th scope="col" class="text-end" style="width: 25%;">Harga Satuan</th>
          </tr>
        </thead>
        <tbody>
          @forelse($sale->itempenjualan as $index => $item)
          <tr>
            <td class="fw-bold text-muted">{{ $index + 1 }}</td>
            <td class="text-center">
              @if($item->produk && $item->produk->foto)
                <img src="{{ asset('storage/' . $item->produk->foto) }}" class="product-thumb" alt="{{ $item->produk->nama }}">
              @else
                <div class="bg-light rounded d-flex align-items-center justify-content-center m-auto" style="width: 55px; height: 55px; border: 1px solid #e2e8f0;">
                  <span class="text-muted" style="font-size: 1rem;">🖼️</span>
                </div>
              @endif
            </td>
            <td class="fw-bold text-dark">{{ $item->produk->nama ?? 'Produk Dihapus' }}</td>
            <td class="text-end fw-bold text-success">
              Rp {{ number_format($item->produk->harga_jual ?? 0, 0, ',', '.') }}
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="4" class="text-muted text-center py-4">
              Tidak ada item dalam transaksi ini.
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection