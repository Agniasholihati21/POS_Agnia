@extends('layouts.app')

@section('title', 'Daftar Produk - Luxe Florist')

@section('content')

@include('layouts.navbar')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
  :root {
    --luxury-bg: #FAF6F0;
    --luxury-card-bg: #FFFFFF;
    --primary-pink: #E88A9A;
    --soft-rose: #FFD3DD;
    --dark-rose: #C2596C;
    --text-dark: #2D2527;
    --text-muted: #8C827A;
    --border-color: #F7E7EB;
  }

  body {
    background-color: var(--luxury-bg);
    color: var(--text-dark);
    font-family: 'Plus Jakarta Sans', sans-serif;
  }

  h1, h2, h3, h4, .serif-font {
    font-family: 'Playfair Display', serif;
  }

  /* Header Section (Gradasi Pink Navbar) */
  .page-header {
    background: linear-gradient(135deg, #FF758C 0%, #FF7EB3 50%, #B87BFF 100%);
    border-radius: 20px;
    padding: 2.2rem 2.5rem;
    color: #FFFFFF;
    box-shadow: 0 12px 30px rgba(255, 117, 140, 0.25);
    margin-bottom: 2.5rem;
    position: relative;
    overflow: hidden;
  }

  .page-header::after {
    content: '';
    position: absolute;
    top: -50px;
    right: -50px;
    width: 200px;
    height: 200px;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, rgba(0,0,0,0) 70%);
    border-radius: 50%;
    pointer-events: none;
  }

  /* Card Container */
  .content-card {
    background: var(--luxury-card-bg);
    border-radius: 20px;
    border: 1px solid var(--border-color);
    box-shadow: 0 8px 24px rgba(232, 138, 154, 0.08);
    padding: 2rem;
  }

  /* Search Box Styling */
  .search-box .form-control {
    border-radius: 12px 0 0 12px;
    border: 1px solid var(--border-color);
    padding: 0.65rem 1.2rem;
    background-color: #FFF7F9;
    color: var(--text-dark);
  }

  .search-box .form-control:focus {
    box-shadow: none;
    border-color: var(--primary-pink);
    background-color: #FFFFFF;
  }

  .search-box .btn-search {
    background: linear-gradient(135deg, #E88A9A 0%, #D46A7E 100%);
    color: white;
    border-radius: 0 12px 12px 0;
    padding: 0.65rem 1.4rem;
    font-weight: 600;
    border: none;
    transition: all 0.3s ease;
  }

  .search-box .btn-search:hover {
    background: linear-gradient(135deg, #D46A7E 0%, #C2596C 100%);
    color: white;
  }

  /* Action Button Create (Pink Soft) */
  .btn-create {
    background: linear-gradient(135deg, #FF8EA3 0%, #E86B83 100%);
    color: white;
    border: none;
    border-radius: 12px;
    padding: 0.7rem 1.4rem;
    font-weight: 600;
    box-shadow: 0 4px 15px rgba(232, 107, 131, 0.3);
    transition: all 0.3s ease;
    text-decoration: none;
  }

  .btn-create:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(232, 107, 131, 0.4);
    color: white;
  }

  /* Product Thumbnail */
  .product-thumb {
    width: 55px;
    height: 55px;
    object-fit: cover;
    border-radius: 12px;
    border: 1px solid var(--border-color);
    transition: transform 0.2s ease;
  }

  .product-thumb:hover {
    transform: scale(1.1);
  }

  /* Table Custom Styling */
  .table-custom {
    margin-bottom: 0;
  }

  .table-custom thead th {
    background: #FFF2F5;
    border: none;
    color: var(--dark-rose);
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 14px 16px;
    font-weight: 700;
  }

  .table-custom tbody td {
    padding: 16px;
    border-bottom: 1px solid #FFF0F3;
    color: var(--text-dark);
    font-size: 0.9rem;
  }

  .table-custom tbody tr:last-child td {
    border-bottom: none;
  }

  .table-custom tbody tr:hover {
    background-color: #FFF9FA;
  }

  /* Badges & Indicators */
  .badge-stock-safe {
    background-color: #F3F9F5;
    color: #1B4D3E;
    border: 1px solid #C3E6D0;
    padding: 5px 12px;
    border-radius: 30px;
    font-weight: 700;
    font-size: 0.75rem;
  }

  .badge-stock-low {
    background-color: #FFF8E7;
    color: #9A6B00;
    border: 1px solid #FFE29D;
    padding: 5px 12px;
    border-radius: 30px;
    font-weight: 700;
    font-size: 0.75rem;
  }

  /* Action Buttons inside Table */
  .btn-action-detail {
    background-color: #FFF0FA;
    color: #B85BB8;
    border: 1px solid #F5D3F5;
    border-radius: 10px;
    padding: 6px 12px;
    font-weight: 600;
    font-size: 0.825rem;
    transition: all 0.2s ease;
    text-decoration: none;
  }

  .btn-action-detail:hover {
    background-color: #F5D3F5;
    color: #8C328C;
  }

  .btn-action-edit {
    background-color: #FFF8E7;
    color: #9A6B00;
    border: 1px solid #FFE29D;
    border-radius: 10px;
    padding: 6px 12px;
    font-weight: 600;
    font-size: 0.825rem;
    transition: all 0.2s ease;
    text-decoration: none;
  }

  .btn-action-edit:hover {
    background-color: #FFE29D;
    color: #704E00;
  }

  .btn-action-delete {
    background-color: #FFF0F0;
    color: #D93838;
    border: 1px solid #FFCDCD;
    border-radius: 10px;
    padding: 6px 12px;
    font-weight: 600;
    font-size: 0.825rem;
    transition: all 0.2s ease;
  }

  .btn-action-delete:hover {
    background-color: #FFCDCD;
    color: #B02020;
  }

  /* Pagination Styling */
  .pagination {
    margin-bottom: 0;
  }

  .page-link {
    color: var(--dark-rose);
    border-color: var(--border-color);
  }

  .page-item.active .page-link {
    background-color: var(--primary-pink);
    border-color: var(--primary-pink);
  }
</style>

<div class="container my-4">
  <div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-3">
    <div>
      <h2 class="serif-font fw-bold m-0 fs-2">Produk</h2>
      <p class="text-white m-0 mt-1" style="opacity: 0.95;">Kelola koleksi produk, pembaruan stok, dan penetapan harga jual</p>
    </div>
    <div class="d-none d-md-block">
      <i class="bi bi-box-seam display-4 text-white" style="opacity: 0.3;"></i>
    </div>
  </div>

  <div class="content-card">
    <div class="row g-3 justify-content-between align-items-center mb-4">
      <div class="col-md-5 col-lg-4">
        @can('create', App\Models\Produk::class)
          <a href="{{ route('produk.create') }}" class="btn btn-create d-inline-flex align-items-center gap-2">
            <i class="bi bi-plus-circle-fill"></i> Tambah Produk Baru
          </a>
        @endcan
      </div>

      <div class="col-md-7 col-lg-5">
        <form action="{{ route('produk.index') }}" method="GET">
          <div class="input-group search-box">
            <input
              type="text"
              name="search"
              value="{{ request('search') }}"
              class="form-control"
              placeholder="Cari nama produk..."
            >
            <button class="btn btn-search" type="submit">
              <i class="bi bi-search me-1"></i> Cari
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-custom align-middle">
        <thead>
          <tr>
            <th scope="col" style="width: 5%;">#</th>
            <th scope="col" class="text-center" style="width: 10%;">Foto</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Penginput</th>
            <th scope="col">Harga Beli</th>
            <th scope="col">Harga Jual</th>
            <th scope="col" class="text-center">Stok</th>
            <th scope="col" class="text-center" style="width: 22%;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($products as $product)
          <tr>
            <td class="text-muted fs-7">{{ $products->firstItem() + $loop->index }}</td>
            <td class="text-center">
              @if($product->foto)
                <img src="{{ asset('storage/'.$product->foto) }}" class="product-thumb" alt="{{ $product->nama }}">
              @else
                <div class="rounded d-flex align-items-center justify-content-center m-auto" style="width: 55px; height: 55px; background-color: #FFF7F9; border: 1px solid var(--border-color);">
                  <i class="bi bi-flower1 fs-4" style="color: var(--primary-pink);"></i>
                </div>
              @endif
            </td>
            <td class="fw-bold text-dark">{{ $product->nama }}</td>
            <td class="text-secondary">
              <div class="d-flex align-items-center gap-1">
                <i class="bi bi-person me-1 text-muted"></i>
                <span>{{ $product->user->name ?? 'Sistem' }}</span>
              </div>
            </td>
            <td class="fw-semibold text-secondary">Rp {{ number_format($product->harga_beli, 0, ',', '.') }}</td>
            <td class="fw-bold" style="color: var(--dark-rose);">Rp {{ number_format($product->harga_jual, 0, ',', '.') }}</td>
            <td class="text-center">
              @if($product->stok > 5)
                <span class="badge-stock-safe"><i class="bi bi-check-circle me-1"></i>{{ $product->stok }}</span>
              @else
                <span class="badge-stock-low"><i class="bi bi-exclamation-triangle me-1"></i>{{ $product->stok }}</span>
              @endif
            </td>
            <td class="text-center">
              <div class="d-flex justify-content-center gap-1">
                <a href="{{ route('produk.show', $product) }}" class="btn btn-action-detail">
                  <i class="bi bi-eye me-1"></i> Detail
                </a>

                @can('update', $product)
                  <a href="{{ route('produk.edit', $product) }}" class="btn btn-action-edit">
                    <i class="bi bi-pencil-square me-1"></i> Edit
                  </a>
                @endcan

                @can('delete', $product)
                  <form action="{{ route('produk.destroy', $product) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-action-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                      <i class="bi bi-trash3 me-1"></i> Hapus
                    </button>
                  </form>
                @endcan
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="8" class="text-muted text-center py-5">
              <i class="bi bi-box-seam fs-1 d-block text-muted mb-2"></i>
              <span class="fw-semibold">Data produk tidak ditemukan atau belum tersedia.</span>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-4">
      {{ $products->links() }}
    </div>
  </div>
</div>

@endsection