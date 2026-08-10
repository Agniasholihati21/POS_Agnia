@extends('layouts.app')

@section('title', 'Beranda')

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
    --primary-burgundy: #4A0E17;
    --soft-rose: #C88EA7;
    --gold-accent: #D4AF37;
    --gold-gradient: linear-gradient(135deg, #BF953F 0%, #FCF6BA 25%, #B38728 50%, #FBF5B7 75%, #AA771C 100%);
    --text-dark: #1F191A;
    --text-muted: #8C827A;
    --border-color: #EFE6DD;
  }

  body {
    background-color: var(--luxury-bg);
    color: var(--text-dark);
    font-family: 'Plus Jakarta Sans', sans-serif;
  }

  h1, h2, h3, h4, .serif-font {
    font-family: 'Playfair Display', serif;
  }

  /* Header Section (Diubah ke Gradasi Pink Navbar) */
  .dashboard-header {
    background: linear-gradient(135deg, #FF758C 0%, #FF7EB3 50%, #B87BFF 100%);
    border-radius: 20px;
    padding: 2.5rem;
    color: #FFFFFF;
    box-shadow: 0 12px 30px rgba(255, 117, 140, 0.25);
    margin-bottom: 2.5rem;
    border: none;
    position: relative;
    overflow: hidden;
  }

  .dashboard-header::after {
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

  .header-badge {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.4);
    color: #FFFFFF;
    padding: 6px 16px;
    border-radius: 30px;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
  }

  /* Section Titles */
  .section-title {
    font-size: 1.35rem;
    font-weight: 700;
    color: var(--primary-burgundy);
    margin: 2.5rem 0 1.25rem;
    display: flex;
    align-items: center;
    gap: 10px;
    font-family: 'Playfair Display', serif;
  }

  .section-title::after {
    content: '';
    flex-grow: 1;
    height: 1px;
    background: linear-gradient(to right, var(--border-color), transparent);
  }

  /* Cards Style */
  .summary-card {
    border: 1px solid var(--border-color);
    border-radius: 16px;
    background: var(--luxury-card-bg);
    padding: 1.5rem;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.02);
    height: 100%;
  }

  .summary-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(74, 14, 23, 0.08);
    border-color: var(--soft-rose);
  }

  .icon-box {
    width: 52px;
    height: 52px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
    margin-bottom: 1rem;
  }

  .icon-burgundy { background: #F8EFEF; color: var(--primary-burgundy); }
  .icon-gold { background: #FAF5E6; color: #B38728; }
  .icon-rose { background: #FBF0F4; color: var(--soft-rose); }
  .icon-emerald { background: #EBF6F0; color: #1B4D3E; }

  .stat-label {
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--text-muted);
    font-weight: 600;
  }

  .stat-value {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--primary-burgundy);
    margin-top: 0.25rem;
  }

  /* Tables Style */
  .luxury-table-card {
    background: var(--luxury-card-bg);
    border-radius: 16px;
    border: 1px solid var(--border-color);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.02);
    padding: 1.5rem;
    margin-bottom: 2rem;
  }

  .table-custom {
    margin-bottom: 0;
  }

  .table-custom thead th {
    background: #FAF6F0;
    border: none;
    color: var(--primary-burgundy);
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 12px 16px;
    font-weight: 700;
  }

  .table-custom tbody td {
    padding: 16px;
    border-bottom: 1px solid #F6F0EA;
    color: var(--text-dark);
    font-size: 0.9rem;
  }

  .table-custom tbody tr:last-child td {
    border-bottom: none;
  }

  .table-custom tbody tr:hover {
    background-color: #FCF9F5;
  }

  /* Status Badges */
  .badge-luxury-warning {
    background: #FFF8E7;
    color: #9A6B00;
    border: 1px solid #FFE29D;
    padding: 5px 12px;
    border-radius: 30px;
    font-size: 0.75rem;
    font-weight: 600;
  }

  .badge-luxury-danger {
    background: #FDF2F2;
    color: #9B1C1C;
    border: 1px solid #FBD5D5;
    padding: 5px 12px;
    border-radius: 30px;
    font-size: 0.75rem;
    font-weight: 600;
  }

  .badge-luxury-success {
    background: #F3F9F5;
    color: #1B4D3E;
    border: 1px solid #C3E6D0;
    padding: 5px 12px;
    border-radius: 30px;
    font-size: 0.75rem;
    font-weight: 600;
  }

  .rank-badge {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 0.85rem;
  }

  .rank-1 { background: var(--gold-gradient); color: #4A0E17; box-shadow: 0 2px 6px rgba(179, 135, 40, 0.3); }
  .rank-2 { background: #E2E8F0; color: #475569; }
  .rank-3 { background: #E2D9D2; color: #78350F; }
  .rank-other { background: #F1F5F9; color: #64748B; }

  /* Custom Scrollbar & Pagination Softening */
  .pagination {
    margin-bottom: 0;
  }
  
  .page-link {
    color: var(--primary-burgundy);
    border-color: var(--border-color);
  }
  
  .page-item.active .page-link {
    background-color: var(--primary-burgundy);
    border-color: var(--primary-burgundy);
  }
</style>

<div class="container my-4">

  <div class="dashboard-header">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <span class="header-badge d-inline-block mb-3">
          <i class="bi bi-calendar3 me-2"></i>{{ $tanggalHariIni->translatedFormat('l, d F Y') }}
        </span>
        <h2 class="display-6 fw-bold mb-2">Beranda</h2>
        <p class="text-white mb-0 fs-6" style="opacity: 0.95;">
          @if(auth()->user()->role == 'admin')
          @else
          @endif
        </p>
      </div>
      <div class="col-lg-4 text-lg-end text-center d-none d-lg-block">
        <i class="bi bi-flower2 display-1 text-white" style="opacity: 0.3;"></i>
      </div>
    </div>
  </div>

  @can('viewAny', App\Models\User::class)
    <div class="section-title">
      <i class="bi bi-bar-chart-line text-gold"></i> Ringkasan Penjualan Hari Ini
    </div>

    <div class="row g-4 mb-3">
      <div class="col-xl-3 col-md-6">
        <div class="summary-card">
          <div class="icon-box icon-burgundy">
            <i class="bi bi-cash-stack"></i>
          </div>
          <div class="stat-label">Total Penjualan</div>
          <div class="stat-value">Rp {{ number_format($ringkasan['total_penjualan']) }}</div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6">
        <div class="summary-card">
          <div class="icon-box icon-gold">
            <i class="bi bi-bag-check"></i>
          </div>
          <div class="stat-label">Jumlah Transaksi</div>
          <div class="stat-value">{{ number_format($ringkasan['total_transaksi']) }} <span class="fs-6 fw-normal text-muted">Pesanan</span></div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6">
        <div class="summary-card">
          <div class="icon-box icon-rose">
            <i class="bi bi-wallet2"></i>
          </div>
          <div class="stat-label">Pembayaran Tunai</div>
          <div class="stat-value">Rp {{ number_format($ringkasan['total_cash']) }}</div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6">
        <div class="summary-card">
          <div class="icon-box icon-emerald">
            <i class="bi bi-credit-card-2-front"></i>
          </div>
          <div class="stat-label">Pembayaran Non-Tunai</div>
          <div class="stat-value">Rp {{ number_format($ringkasan['total_non_tunai']) }}</div>
        </div>
      </div>
    </div>
  @endcan

  <div class="section-title">
    <i class="bi bi-box-seam"></i> Status Persediaan Produk
  </div>

  <div class="row g-4">
    <div class="col-lg-6">
      <div class="luxury-table-card">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="serif-font fw-bold text-dark m-0">
            <i class="bi bi-exclamation-circle text-warning me-2"></i>Stok Menipis
          </h5>
          <span class="badge bg-warning text-dark rounded-pill px-3 py-2 fs-7 fw-normal">Perlu Perhatian</span>
        </div>

        <div class="table-responsive">
          <table class="table table-custom align-middle">
            <thead>
              <tr>
                <th width="10%">#</th>
                <th width="65%">Koleksi Buket</th>
                <th width="25%" class="text-end">Sisa Stok</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($produkStokRendah as $index => $produk)
              <tr>
                <td class="text-muted fs-7">{{ $produkStokRendah->firstItem() + $index }}</td>
                <td class="fw-semibold">
                  <div class="d-flex align-items-center">
                    <span class="me-2">🌸</span>
                    <span>{{ $produk->nama }}</span>
                  </div>
                </td>
                <td class="text-end">
                  <span class="badge-luxury-warning">{{ $produk->stok }} Terkikis</span>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="3" class="text-center text-muted py-4">
                  <i class="bi bi-check2-circle fs-3 d-block text-success mb-2"></i>
                  Semua persediaan buket bunga dalam kondisi aman.
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <div class="mt-3">
          {{ $produkStokRendah->links() }}
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="luxury-table-card">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="serif-font fw-bold text-dark m-0">
            <i class="bi bi-x-circle text-danger me-2"></i>Koleksi Habis
          </h5>
          <span class="badge bg-danger text-white rounded-pill px-3 py-2 fs-7 fw-normal">Segera Merangkai</span>
        </div>

        <div class="table-responsive">
          <table class="table table-custom align-middle">
            <thead>
              <tr>
                <th width="10%">#</th>
                <th width="65%">Koleksi Buket</th>
                <th width="25%" class="text-end">Status</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($produkStokHabis as $index => $produk)
              <tr>
                <td class="text-muted fs-7">{{ $produkStokHabis->firstItem() + $index }}</td>
                <td class="fw-semibold">
                  <div class="d-flex align-items-center">
                    <span class="me-2">🥀</span>
                    <span>{{ $produk->nama }}</span>
                  </div>
                </td>
                <td class="text-end">
                  <span class="badge-luxury-danger">Kosong</span>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="3" class="text-center text-muted py-4">
                  <i class="bi bi-heart-fill fs-3 d-block mb-2" style="color: var(--soft-rose);"></i>
                  Tidak ada koleksi buket yang kehabisan stok saat ini.
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <div class="mt-3">
          {{ $produkStokHabis->links() }}
        </div>
      </div>
    </div>
  </div>

  <div class="section-title">
    <i class="bi bi-award"></i> Produk Terlaris 
  </div>

  <div class="row">
    <div class="col-12">
      <div class="luxury-table-card">
        <div class="table-responsive">
          <table class="table table-custom align-middle">
            <thead>
              <tr>
                <th width="10%" class="text-center">Peringkat</th>
                <th width="50%">Nama Buket Bunga</th>
                <th width="20%">Sisa Stok Tersedia</th>
                <th width="20%" class="text-end">Total Terjual</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($produkTerlaris as $index => $produk)
              <tr>
                <td class="text-center">
                  @if($index == 0)
                    <span class="rank-badge rank-1"><i class="bi bi-trophy-fill"></i></span>
                  @elseif($index == 1)
                    <span class="rank-badge rank-2">2</span>
                  @elseif($index == 2)
                    <span class="rank-badge rank-3">3</span>
                  @else
                    <span class="rank-badge rank-other">{{ $index + 1 }}</span>
                  @endif
                </td>
                <td>
                  <div class="fw-bold text-dark fs-6">{{ $produk->nama }}</div>
                  <small class="text-muted">Signature Bouquet Collection</small>
                </td>
                <td>
                  @if($produk->stok > 0)
                    <span class="badge-luxury-success">{{ $produk->stok }} Tersedia</span>
                  @else
                    <span class="badge-luxury-danger">Habis</span>
                  @endif
                </td>
                <td class="text-end">
                  <div class="fw-bold text-dark fs-6">{{ number_format($produk->total_terjual) }} <span class="fs-7 fw-normal text-muted">Buket</span></div>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="4" class="text-center text-muted py-5">
                  <i class="bi bi-basket fs-1 d-block text-muted mb-2"></i>
                  Belum ada data transaksi penjualan buket.
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection