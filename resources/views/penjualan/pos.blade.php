@extends('layouts.app')

@section('title', 'Point of Sale (POS)')

@section('content')

@include('layouts.navbar')

<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

body{
    background:#f4f7fc;
    font-family:'Plus Jakarta Sans',sans-serif;
    color:#334155;
}

/* HEADER */
.page-header{
    background:linear-gradient(135deg,#ff6ea8,#8b5cf6);
    border-radius:25px;
    padding:24px 32px;
    color:#fff;
    box-shadow:0 18px 40px rgba(139,92,246,.25);
    margin-bottom:24px;
}

.page-header h2{
    font-size:36px;
    font-weight:100px;
}

.page-header p{
    font-size:17px;
    opacity:.9;
}

.status-box{
    background:white;
    color:#1f2937;
    padding:10px 22px;
    border-radius:40px;
    font-weight:700;
    font-size:15px;
}

/* CARD */
.pos-card{
    background:#fff;
    border:none;
    border-radius:28px;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
}

.pos-card-header{
    background:white;
    border-bottom:1px solid #edf2f7;
    padding:18px 24px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.pos-card-header span{
    font-size:24px;
    font-weight:800;
    color:#23395d;
}

.pos-card-header small{
    color:#64748b;
    font-weight:600;
    font-size:14px;
}

/* SEARCH */

.pos-search{
    height:52px;
    border-radius:18px;
    border:2px solid #dbeafe;
    font-size:18px;
    padding-left:20px;
}

.pos-search:focus{
    border-color:#8b5cf6;
    box-shadow:0 0 0 .25rem rgba(139,92,246,.15);
}

/* PRODUCT */

.product-item-card{
    background:white;
    border-radius:20px;
    border:1px solid #edf2f7;
    padding:14px;
    transition:.3s;
}

.product-item-card:hover{
    transform:translateY(-4px);
    box-shadow:0 15px 25px rgba(139,92,246,.15);
}

.product-thumb-pos{
    width:65px;
    height:65px;
    border-radius:16px;
    object-fit:cover;
}

.product-name{
    font-size:21px;
    font-weight:700;
}

.price-tag{
    display:inline-block;
    background:#d1fae5;
    color:#047857;
    padding:5px 12px;
    border-radius:12px;
    font-weight:700;
    font-size:17px;
}

/* INPUT */

.qty-input-pos{
    height:44px;
    border-radius:12px;
    text-align:center;
    font-weight:700;
}

.btn-add-pos{
    background:linear-gradient(135deg,#6366f1,#4f46e5);
    border:none;
    border-radius:12px;
    color:white;
    font-size:22px;
    font-weight:700;
    height:44px;
}

.btn-add-pos:hover{
    background:linear-gradient(135deg,#4f46e5,#4338ca);
    color:white;
}

/* CART */

.cart-table th{
    font-size:14px;
    font-weight:700;
    color:#64748b;
}

.cart-table td{
    vertical-align:middle;
}

/* TOTAL */

.total-display-card{
    background:linear-gradient(135deg,#10b981,#059669);
    border-radius:20px;
    padding:22px;
    color:white;
    text-align:center;
}

.total-display-card small{
    display:block;
    font-size:16px;
    font-weight:700;
    opacity:.9;
}

.total-display-card h3{
    font-size:45px;
    font-weight:800;
    margin-top:10px;
}

/* BUTTON */

.btn-checkout{
    height:52px;
    border:none;
    border-radius:15px;
    background:linear-gradient(135deg,#6366f1,#4338ca);
    color:white;
    font-size:20px;
    font-weight:700;
}

.btn-checkout:hover{
    color:white;
}

.btn-cancel-pos{
    height:52px;
    border-radius:15px;
    font-size:18px;
    font-weight:700;
}
</style>

<div class="container-fluid px-4 my-4">

@if(session('errors'))
<div class="alert alert-danger mb-4">
{{ session('errors') }}
</div>
@endif

<div class="page-header d-flex justify-content-between align-items-center">

<div>
<h2>🖥️ {{ $mode=='edit' ? 'Edit Penjualan' : 'Kasir / Point of Sale' }}</h2>

<p>
Pilih produk dan selesaikan transaksi dengan cepat.
</p>
</div>

<div class="status-box">
Status :
<span class="{{ $sale->status=='COMPLETED' ? 'text-success' : 'text-warning' }}">
{{ $sale->status ?? 'OPEN' }}
</span>
</div>

</div>

<div class="row g-4">
      {{-- ================= KATALOG PRODUK ================= --}}
    <div class="col-lg-7">

        <div class="pos-card h-100">

            <div class="pos-card-header">
                <span>🛍️ Katalog Produk</span>

                <small>
                    Klik produk untuk menambah ke keranjang
                </small>
            </div>

            <div class="card-body p-4">

                <form
                    method="GET"
                    action="{{ route('penjualan.create') }}"
                    class="mb-4">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control pos-search"
                        placeholder="🔍 Cari produk..."
                        onkeyup="this.form.submit()">

                </form>

                <div style="max-height:650px;overflow-y:auto;padding-right:6px;">

                    <div class="row g-3">

                        @forelse($products as $product)

                        <div class="col-12">

                            <form
                                action="{{ route('itempenjualan.store') }}"
                                method="POST"
                                class="product-item-card">

                                @csrf

                                <input
                                    type="hidden"
                                    name="produk_id"
                                    value="{{ $product->id }}">

                                <div class="row align-items-center">

                                    {{-- FOTO --}}
                                    <div class="col-md-2">

                                        @if($product->foto)

                                        <img
                                            src="{{ asset('storage/'.$product->foto) }}"
                                            class="product-thumb-pos"
                                            alt="{{ $product->nama }}">

                                        @else

                                        <div
                                            class="d-flex align-items-center justify-content-center bg-light rounded"
                                            style="width:75px;height:75px;font-size:30px;">
                                            📦
                                        </div>

                                        @endif

                                    </div>

                                    {{-- NAMA --}}
                                    <div class="col-md-6">

                                        <div class="product-name">

                                            {{ $product->nama }}

                                        </div>

                                        <div class="mt-2">

                                            <span class="price-tag">

                                                Rp {{ number_format($product->harga_jual,0,',','.') }}

                                            </span>

                                        </div>

                                    </div>

                                    {{-- QTY --}}
                                    <div class="col-md-2">

                                        <input
                                            type="number"
                                            name="quantity"
                                            value="1"
                                            min="1"
                                            class="form-control qty-input-pos"
                                            {{ $sale->status=='COMPLETED' ? 'disabled' : '' }}>

                                    </div>

                                    {{-- BUTTON --}}
                                    <div class="col-md-2">

                                        <button
                                            class="btn btn-add-pos w-100 {{ $sale->status=='COMPLETED' ? 'disabled' : '' }}"
                                            type="submit">

                                            ➕

                                        </button>

                                    </div>

                                </div>

                            </form>

                        </div>

                        @empty

                        <div class="text-center py-5">

                            <img src="{{ asset('images/empty-product.png') }}"
                                 style="width:130px"
                                 onerror="this.style.display='none'">

                            <h4 class="mt-3 text-secondary">

                                Produk tidak ditemukan

                            </h4>

                        </div>

                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </div>
        {{-- ================= KERANJANG BELANJA ================= --}}
    <div class="col-lg-5">

        <div class="pos-card h-100 d-flex flex-column justify-content-between">

            <div>

                <div class="pos-card-header">

                    <span>🛒 Keranjang Belanja</span>

                    <span class="badge rounded-pill bg-primary fs-6 px-3 py-2">

                        {{ count($sale->itempenjualan) }} Item

                    </span>

                </div>

                <div class="table-responsive" style="max-height:500px;overflow-y:auto;">

                    <table class="table cart-table align-middle mb-0">

                        <thead>

                            <tr>

                                <th>Produk</th>

                                <th width="90">Qty</th>

                                <th class="text-end">Subtotal</th>

                                <th width="50"></th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($sale->itempenjualan as $item)

                            <tr>

                                <td>

                                    <div class="fw-bold fs-5">

                                        {{ $item->produk->nama }}

                                    </div>

                                    <small class="text-muted">

                                        Rp {{ number_format($item->produk->harga_jual,0,',','.') }}

                                    </small>

                                </td>

                                <td>

                                    <form
                                        method="POST"
                                        action="{{ route('itempenjualan.update',$item->id) }}">

                                        @csrf
                                        @method('PUT')

                                        <input
                                            type="number"
                                            name="quantity"
                                            value="{{ $item->kuantitas }}"
                                            min="1"
                                            class="form-control qty-input-pos"
                                            onchange="this.form.submit()"
                                            {{ $sale->status=='COMPLETED' ? 'disabled':'' }}>

                                    </form>

                                </td>

                                <td class="text-end fw-bold fs-5">

                                    Rp {{ number_format($item->subtotal,0,',','.') }}

                                </td>

                                <td class="text-center">

                                    @can('delete',$item)

                                    <form
                                        method="POST"
                                        action="{{ route('itempenjualan.destroy',$item->id) }}">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="btn btn-sm btn-outline-danger rounded-circle">

                                            🗑️

                                        </button>

                                    </form>

                                    @endcan

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="4" class="text-center py-5">

                                    <div style="font-size:60px;">🛒</div>

                                    <h5 class="text-secondary">

                                        Keranjang masih kosong

                                    </h5>

                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            {{-- TOTAL PEMBAYARAN --}}

            <div class="p-4 border-top bg-light">

                <div class="total-display-card">

                    <small>Total Tagihan</small>

                    <h3>

                        Rp {{ number_format($sale->total_pembayaran,0,',','.') }}

                    </h3>

                </div>
                                <form
                    method="POST"
                    action="{{ route('penjualan.update', $sale->id) }}"
                    onsubmit="return confirm('Selesaikan transaksi dan lakukan checkout?')"
                    class="mt-4">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            💳 Metode Pembayaran
                        </label>

                        <select
                            name="payment_method"
                            class="form-select form-select-lg"
                            required
                            {{ $sale->status=='COMPLETED' ? 'disabled' : '' }}>

                            <option value="">Pilih Metode Pembayaran</option>

                            <option value="CASH">
                                💵 Cash / Tunai
                            </option>

                            <option value="QRIS">
                                📱 QRIS / Non Tunai
                            </option>

                        </select>

                    </div>

                    <button
                        type="submit"
                        class="btn btn-checkout w-100 {{ $sale->status=='COMPLETED' ? 'disabled' : '' }}">

                        ✅ Checkout & Selesaikan

                    </button>

                </form>

                @can('delete',$sale)

                <form
                    action="{{ route('penjualan.destroy',$sale->id) }}"
                    method="POST"
                    class="mt-3"
                    onsubmit="return confirm('Apakah Anda yakin ingin membatalkan transaksi ini?')">

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-outline-danger btn-cancel-pos w-100">

                        ❌ Batalkan Transaksi

                    </button>

                </form>

                @endcan

            </div>

        </div>

    </div>

</div>

@endsection