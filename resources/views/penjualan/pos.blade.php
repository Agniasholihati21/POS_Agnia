@extends('layouts.app')

@section('title', 'Point of Sale (POS)')

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
    padding: 1.5rem 1.8rem;
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(30, 30, 56, 0.15);
    margin-bottom: 1.5rem;
  }

  /* POS Section Cards */
  .pos-card {
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.04);
    border: 1px solid #e2e8f0;
    overflow: hidden;
  }

  .pos-card-header {
    background: #f8fafc;
    padding: 1rem 1.25rem;
    border-bottom: 1px solid #e2e8f0;
    font-weight: 700;
    color: #334155;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  /* Search Input */
  .pos-search {
    border-radius: 10px;
    border: 1px solid #cbd5e1;
    padding: 0.6rem 1rem;
    transition: all 0.2s ease;
  }

  .pos-search:focus {
    border-color: #6366f1;
    box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
  }

  /* Product Item Cards */
  .product-item-card {
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 0.75rem;
    background: #ffffff;
    transition: all 0.2s ease;
  }

  .product-item-card:hover {
    border-color: #6366f1;
    box-shadow: 0 4px 12px rgba(99, 102, 241, 0.1);
  }

  .product-thumb-pos {
    width: 48px;
    height: 48px;
    object-fit: cover;
    border-radius: 10px;
    border: 1px solid #e2e8f0;
  }

  .qty-input-pos {
    border-radius: 8px;
    border: 1px solid #cbd5e1;
    text-align: center;
    font-weight: 600;
  }

  .btn-add-pos {
    background: #6366f1;
    color: white;
    border: none;
    border-radius: 8px;
    font-weight: 700;
    transition: all 0.2s ease;
  }

  .btn-add-pos:hover {
    background: #4f46e5;
    color: white;
  }

  /* Cart Table */
  .cart-table thead {
    background-color: #f8fafc;
  }

  .cart-table thead th {
    border: none;
    color: #64748b;
    font-weight: 700;
    font-size: 0.75rem;
    text-transform: uppercase;
    padding: 12px;
  }

  /* Summary Section */
  .total-display-card {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
    padding: 1.25rem;
    border-radius: 12px;
    text-align: center;
    margin-bottom: 1rem;
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
  }

  .total-display-card small {
    text-transform: uppercase;
    letter-spacing: 1px;
    opacity: 0.85;
    font-weight: 600;
    font-size: 0.8rem;
  }

  .total-display-card h3 {
    margin: 0;
    font-weight: 800;
    font-size: 1.8rem;
  }

  .btn-checkout {
    background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
    color: white;
    border: none;
    border-radius: 10px;
    padding: 0.75rem;
    font-weight: 700;
    box-shadow: 0 4px 12px rgba(99, 102, 241, 0.25);
    transition: all 0.2s ease;
  }

  .btn-checkout:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(99, 102, 241, 0.35);
    color: white;
  }

  .btn-cancel-pos {
    border-radius: 10px;
    padding: 0.65rem;
    font-weight: 600;
  }

  /* Custom Alert */
  .custom-alert {
    border-radius: 12px;
    border: none;
    box-shadow: 0 4px 12px rgba(225, 29, 72, 0.15);
  }
</style>

<div class="container-fluid px-4 my-4">
  @if(session('errors'))
    <div class="alert alert-danger custom-alert alert-dismissible fade show mb-4" role="alert">
      <strong>⚠️ Perhatian:</strong> {{ session('errors') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="page-header d-flex justify-content-between align-items-center flex-wrap">
    <div>
      <h2 class="fw-bold m-0">🖥️ {{ $mode === 'edit' ? 'Edit Penjualan' : 'Kasir / Point of Sale'}}</h2>
      <p class="text-white-50 m-0 mt-1">Pilih produk dan selesaikan transaksi dengan cepat</p>
    </div>
    <div>
      <span class="badge bg-white text-dark px-3 py-2 rounded-pill fw-semibold">
        Status Transaction: 
        <span class="{{ $sale->status === 'COMPLETED' ? 'text-success' : 'text-warning' }} fw-bold">
          {{ $sale->status ?? 'DRAFT' }}
        </span>
      </span>
    </div>
  </div>

  <div class="row g-4">
    {{-- ================== KATALOG PRODUK ================== --}}
    <div class="col-lg-7">
      <div class="pos-card h-100">
        <div class="pos-card-header">
          <span>🛍️ Katalog Produk</span>
          <small class="text-muted">Klik produk untuk menambah ke keranjang</small>
        </div>
        
        <div class="card-body p-3">
          <div class="mb-3">
            <form method="GET" action="{{ route('penjualan.create') }}">
              <input 
                type="text"
                name="search"
                value="{{ request('search') }}"
                class="form-control pos-search"
                placeholder="🔍 Cari nama produk..."
                onkeyup="this.form.submit()"
              >
            </form>
          </div>

          <div style="max-height: 60vh; overflow-y: auto;" class="pe-1">
            <div class="row g-2">
              @forelse($products as $product)
                <div class="col-12">
                  <form method="POST" action="{{ route('itempenjualan.store') }}" class="product-item-card">
                    @csrf
                    <input type="hidden" name="produk_id" value="{{ $product->id }}">

                    <div class="row align-items-center g-2">
                      <div class="col-7 col-md-7">
                        <div class="d-flex align-items-center gap-2">
                          @if($product->foto)
                            <img src="{{ asset('storage/'.$product->foto) }}" alt="{{ $product->nama }}" class="product-thumb-pos">
                          @else
                            <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; border: 1px solid #e2e8f0;">
                              <span>🖼️</span>
                            </div>
                          @endif
                          <div>
                            <div class="fw-bold text-dark text-truncate" style="max-width: 180px;">{{ $product->nama }}</div>
                            <span class="badge bg-success-subtle text-success fw-bold">
                              Rp {{ number_format($product->harga_jual, 0, ',', '.') }}
                            </span>
                          </div>
                        </div>
                      </div>

                      <div class="col-3 col-md-3">
                        <input 
                          type="number" 
                          name="quantity" 
                          value="1" 
                          min="1"
                          class="form-control form-control-sm qty-input-pos"
                          {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}
                        >
                      </div>

                      <div class="col-2 col-md-2">
                        <button 
                          type="submit" 
                          class="btn btn-add-pos btn-sm w-100 py-2 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}"
                        >
                          ➕
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              @empty
                <div class="text-center text-muted py-5">
                  📦 Produk tidak ditemukan.
                </div>
              @endforelse
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- ================== KERANJANG & CHECKOUT ================== --}}
    <div class="col-lg-5">
      <div class="pos-card h-100 d-flex flex-column justify-content-between">
        <div>
          <div class="pos-card-header">
            <span>🛒 Keranjang Belanja</span>
            <span class="badge bg-primary rounded-pill">{{ count($sale->itempenjualan) }} Item</span>
          </div>

          <div class="table-responsive" style="max-height: 40vh; overflow-y: auto;">
            <table class="table cart-table align-middle mb-0">
              <thead>
                <tr>
                  <th scope="col">Produk</th>
                  <th scope="col" style="width: 25%;">Qty</th>
                  <th scope="col" class="text-end">Subtotal</th>
                  <th scope="col" class="text-center" style="width: 10%;">#</th>
                </tr>
              </thead>
              <tbody>
                @forelse($sale->itempenjualan as $item)
                  <tr>
                    <td>
                      <div class="fw-bold text-dark">{{ $item->produk->nama }}</div>
                      <small class="text-muted">Rp {{ number_format($item->produk->harga_jual, 0, ',', '.') }}</small>
                    </td>
                    <td>
                      <form method="POST" action="{{ route('itempenjualan.update', $item->id) }}">
                        @csrf 
                        @method('PUT')
                        <input 
                          type="number" 
                          name="quantity"
                          value="{{ $item->kuantitas }}"
                          min="1"
                          class="form-control form-control-sm qty-input-pos"
                          onchange="this.form.submit()"
                          {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}
                        >
                      </form>
                    </td>
                    <td class="text-end fw-bold text-dark">
                      Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                    </td>
                    <td class="text-center">
                      @can('delete', $item)
                        <form method="POST" action="{{ route('itempenjualan.destroy', $item->id) }}">
                          @csrf 
                          @method('DELETE')
                          <button class="btn btn-sm text-danger p-0 border-0" title="Hapus">
                            🗑️
                          </button>
                        </form>
                      @endcan
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="4" class="text-center text-muted py-5">
                      🛒 Keranjang masih kosong.
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>

        <div class="p-3 border-top bg-light">
          <div class="total-display-card">
            <small>Total Tagihan</small>
            <h3>Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}</h3>
          </div>

          <form 
            method="POST" 
            action="{{ route('penjualan.update', $sale->id) }}"
            onsubmit="return confirm('Selesaikan transaksi dan lakukan checkout?')" 
            class="mb-2"
          >
            @csrf
            @method('PUT')

            <div class="mb-2">
              <select name="payment_method" class="form-select fw-semibold" required {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}>
                <option value="">-- Pilih Metode Pembayaran --</option>
                <option value="CASH">💵 Cash / Tunai</option>
                <option value="QRIS">📱 QRIS / Non-Tunai</option>
              </select>
            </div>

            <button type="submit" class="btn btn-checkout w-100 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">
              ✅ Checkout & Selesaikan
            </button>
          </form>

          @can('delete', $sale)
            <form 
              action="{{ route('penjualan.destroy', $sale->id) }}"
              method="POST"
              onsubmit="return confirm('Apakah Anda yakin ingin membatalkan transaksi ini?')"
            >
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-outline-danger btn-cancel-pos w-100">
                🚫 Batal Transaksi
              </button>
            </form>
          @endcan
        </div>
      </div>
    </div>
  </div>
</div>

@endsection