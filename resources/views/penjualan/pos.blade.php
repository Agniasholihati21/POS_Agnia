@extends('layouts.app')

@section('title', 'Point of Sale (POS)')

@section('content')

@include('layouts.navbar')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

    /* ================= GLOBAL ================= */

    body {
        background: #f4f7fc;
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: #334155;
    }


    /* ================= HEADER ================= */

    .page-header {
        background: linear-gradient(135deg, #e78d9b, #e78d9b);
        border-radius: 20px;
        padding: 20px 28px;
        color: #fff;
        box-shadow: 0 12px 25px rgba(139, 92, 246, .15);
        margin-bottom: 20px;
    }

    .page-header h2 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .page-header p {
        font-size: 14px;
        margin: 0;
        opacity: .9;
    }

    .status-box {
        background: #fff;
        color: #1f2937;
        padding: 8px 18px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 14px;
    }


    /* ================= CARD ================= */

    .pos-card {
        background: #fff;
        border: none;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, .06);
    }

    .pos-card-header {
        background: #fff;
        border-bottom: 1px solid #edf2f7;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .pos-card-header span {
        font-size: 20px;
        font-weight: 800;
        color: #23395d;
    }

    .pos-card-header small {
        color: #64748b;
        font-weight: 600;
        font-size: 12px;
    }


    /* ================= SEARCH ================= */

    .pos-search {
        height: 44px;
        border-radius: 12px;
        border: 1px solid #dbeafe;
        font-size: 14px;
        padding-left: 15px;
    }

    .pos-search:focus {
        border-color: #8b5cf6;
        box-shadow: 0 0 0 .2rem rgba(139, 92, 246, .12);
    }


    /* ================= PRODUCT CARD ================= */

    .product-item-card {
        background: #fff;
        border: 1px solid #e5eaf0;
        border-radius: 10px;
        padding: 5px 8px;
        margin: 0;
        min-height: 0;
        transition: .2s;
    }

    .product-item-card:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 10px rgba(99, 102, 241, .10);
    }

    .product-item-card > .row {
        margin: 0;
        min-height: 0;
    }

    .product-item-card > .row > div {
        padding-left: 4px;
        padding-right: 4px;
    }


    /* ================= FOTO PRODUK ================= */

    .product-thumb-pos {
        width: 45px;
        height: 45px;
        border-radius: 9px;
        object-fit: cover;
    }


    /* ================= NAMA PRODUK ================= */

    .product-name {
        font-size: 15px;
        line-height: 18px;
        font-weight: 700;
        color: #334155;
    }


    /* ================= HARGA ================= */

    .price-tag {
        display: inline-block;
        background: #d1fae5;
        color: #047857;
        padding: 3px 8px;
        border-radius: 8px;
        font-size: 12px;
        line-height: 15px;
        font-weight: 700;
    }


    /* ================= JARAK HARGA ================= */

    .product-name + div {
        margin-top: 3px !important;
    }


    /* ================= QUANTITY ================= */

    .qty-input-pos {
        width: 65px;
        height: 32px;
        min-height: 32px;
        border-radius: 8px;
        text-align: center;
        font-size: 13px;
        font-weight: 700;
        padding: 2px;
    }


    /* ================= BUTTON TAMBAH ================= */

    .btn-add-pos {
        height: 32px;
        min-height: 32px;
        border: none;
        border-radius: 8px;
        background: linear-gradient(135deg, #6366f1, #4f46e5);
        color: #fff;
        font-size: 17px;
        font-weight: 700;
        line-height: 32px;
        padding: 0;
    }

    .btn-add-pos:hover {
        background: linear-gradient(135deg, #4f46e5, #4338ca);
        color: #fff;
    }


    /* ================= CART ================= */

    .cart-table th {
        font-size: 12px;
        font-weight: 700;
        color: #64748b;
    }

    .cart-table td {
        vertical-align: middle;
        font-size: 13px;
    }

    .cart-table .fw-bold {
        font-size: 14px !important;
    }


    /* ================= TOTAL ================= */

    .total-display-card {
        background: linear-gradient(135deg, #e78d9b, #e78);
        border-radius: 16px;
        padding: 18px;
        color: #fff;
        text-align: center;
    }

    .total-display-card small {
        display: block;
        font-size: 14px;
        font-weight: 700;
        opacity: .9;
    }

    .total-display-card h3 {
        font-size: 36px;
        font-weight: 800;
        margin-top: 6px;
        margin-bottom: 0;
    }


    /* ================= CHECKOUT ================= */

    .btn-checkout {
        height: 48px;
        border: none;
        border-radius: 12px;
        background: linear-gradient(135deg, #e78d9b, #e78d9b);
        color: #fff;
        font-size: 17px;
        font-weight: 700;
    }

    .btn-checkout:hover {
        color: #fff;
    }

    .btn-cancel-pos {
        height: 48px;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 700;
    }


    /* ================= RESPONSIVE ================= */

    @media (max-width: 992px) {

        .product-item-card {
            padding: 7px;
        }

        .product-thumb-pos {
            width: 45px;
            height: 45px;
        }

        .product-name {
            font-size: 14px;
        }

        .qty-input-pos {
            width: 60px;
        }

    }

</style>


<div class="container-fluid px-4 my-3">

    {{-- ERROR --}}
    @if(session('errors'))

        <div class="alert alert-danger mb-3">
            {{ session('errors') }}
        </div>

    @endif


    {{-- ================= HEADER ================= --}}

    <div class="page-header d-flex justify-content-between align-items-center">

        <div>

            <h2>
                🖥️
                {{ $mode == 'edit' ? 'Edit Penjualan' : 'Kasir / Point of Sale' }}
            </h2>

            <p>
                Pilih produk dan selesaikan transaksi dengan cepat.
            </p>

        </div>


        <div class="status-box">

            Status :

            <span class="{{ $sale->status == 'COMPLETED' ? 'text-success' : 'text-warning' }}">

                {{ $sale->status ?? 'OPEN' }}

            </span>

        </div>

    </div>



    {{-- ================= CONTENT ================= --}}

    <div class="row g-3">


        {{-- ================= KATALOG PRODUK ================= --}}

        <div class="col-lg-7">

            <div class="pos-card h-100">


                {{-- HEADER KATALOG --}}

                <div class="pos-card-header">

                    <span>
                        🛍️ Katalog Produk
                    </span>

                    <small>
                        Klik produk untuk menambah ke keranjang
                    </small>

                </div>


                <div class="card-body p-3">


                    {{-- SEARCH --}}

                    <form
                        method="GET"
                        action="{{ route('penjualan.create') }}"
                        class="mb-3">

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control pos-search"
                            placeholder="🔍 Cari produk..."
                            onkeyup="this.form.submit()">

                    </form>


                    {{-- DAFTAR PRODUK --}}

                    <div
                        style="
                            max-height:650px;
                            overflow-y:auto;
                            overflow-x:hidden;
                            padding-right:4px;
                        ">


                        <div class="row g-1">


                            @forelse($products as $product)


                                {{-- PRODUCT --}}

                                <div class="col-12 p-0">


                                    <form
                                        action="{{ route('itempenjualan.store') }}"
                                        method="POST"
                                        class="product-item-card">

                                        @csrf


                                        <input
                                            type="hidden"
                                            name="produk_id"
                                            value="{{ $product->id }}">


                                        <div class="row align-items-center g-0">


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
                                                        style="
                                                            width:45px;
                                                            height:45px;
                                                            font-size:20px;
                                                        ">

                                                        📦

                                                    </div>

                                                @endif

                                            </div>


                                            {{-- NAMA + HARGA --}}

                                            <div class="col-md-6">

                                                <div class="product-name">

                                                    {{ $product->nama }}

                                                </div>


                                                <div class="mt-1">

                                                    <span class="price-tag">

                                                        Rp {{ number_format($product->harga_jual,0,',','.') }}

                                                    </span>

                                                </div>

                                            </div>


                                            {{-- QUANTITY --}}

                                            <div class="col-md-2">

                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    value="1"
                                                    min="1"
                                                    class="form-control qty-input-pos"
                                                    {{ $sale->status == 'COMPLETED' ? 'disabled' : '' }}>

                                            </div>


                                            {{-- BUTTON --}}

                                            <div class="col-md-2">

                                                <button
                                                    class="btn btn-add-pos w-100 {{ $sale->status == 'COMPLETED' ? 'disabled' : '' }}"
                                                    type="submit">

                                                    ➕

                                                </button>

                                            </div>


                                        </div>

                                    </form>


                                </div>


                            @empty


                                <div class="text-center py-5">

                                    <img
                                        src="{{ asset('images/empty-product.png') }}"
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



        {{-- ================= KERANJANG ================= --}}

        <div class="col-lg-5">

            <div class="pos-card h-100 d-flex flex-column justify-content-between">


                <div>


                    {{-- HEADER CART --}}

                    <div class="pos-card-header">

                        <span>
                            🛒 Keranjang Belanja
                        </span>

                        <span class="badge rounded-pill bg-primary fs-6 px-3 py-2">

                            {{ count($sale->itempenjualan) }} Item

                        </span>

                    </div>


                    {{-- CART TABLE --}}

                    <div
                        class="table-responsive"
                        style="
                            max-height:500px;
                            overflow-y:auto;
                        ">

                        <table class="table cart-table align-middle mb-0">


                            <thead>

                                <tr>

                                    <th>
                                        Produk
                                    </th>

                                    <th width="70">
                                        Qty
                                    </th>

                                    <th class="text-end">
                                        Subtotal
                                    </th>

                                    <th width="45"></th>

                                </tr>

                            </thead>


                            <tbody>


                                @forelse($sale->itempenjualan as $item)


                                    <tr>


                                        {{-- PRODUK --}}

                                        <td>

                                            <div class="fw-bold">

                                                {{ $item->produk->nama }}

                                            </div>

                                            <small class="text-muted">

                                                Rp {{ number_format($item->produk->harga_jual,0,',','.') }}

                                            </small>

                                        </td>


                                        {{-- QTY --}}

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
                                                    {{ $sale->status == 'COMPLETED' ? 'disabled' : '' }}>

                                            </form>

                                        </td>


                                        {{-- SUBTOTAL --}}

                                        <td class="text-end fw-bold">

                                            Rp {{ number_format($item->subtotal,0,',','.') }}

                                        </td>


                                        {{-- DELETE --}}

                                        <td class="text-center">

                                            @can('delete',$item)

                                                <form
                                                    method="POST"
                                                    action="{{ route('itempenjualan.destroy',$item->id) }}">

                                                    @csrf

                                                    @method('DELETE')


                                                    <button
                                                        class="btn btn-sm btn-outline-danger rounded-circle"
                                                        type="submit">

                                                        🗑️

                                                    </button>

                                                </form>

                                            @endcan

                                        </td>


                                    </tr>


                                @empty


                                    <tr>

                                        <td
                                            colspan="4"
                                            class="text-center py-5">

                                            <div style="font-size:50px;">
                                                🛒
                                            </div>

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



                {{-- ================= TOTAL PEMBAYARAN ================= --}}

                <div class="p-3 border-top bg-light">


                    {{-- TOTAL --}}

                    <div class="total-display-card">

                        <small>
                            Total Tagihan
                        </small>

                        <h3>

                            Rp {{ number_format($sale->total_pembayaran,0,',','.') }}

                        </h3>

                    </div>



                    {{-- CHECKOUT FORM --}}

                    <form
                        method="POST"
                        action="{{ route('penjualan.update', $sale->id) }}"
                        onsubmit="return confirm('Selesaikan transaksi dan lakukan checkout?')"
                        class="mt-3">

                        @csrf

                        @method('PUT')


                        <div class="mb-2">

                            <label class="form-label fw-bold">

                                💳 Metode Pembayaran

                            </label>


                            <select
                                name="payment_method"
                                class="form-select"
                                required
                                {{ $sale->status == 'COMPLETED' ? 'disabled' : '' }}>

                                <option value="">
                                    Pilih Metode Pembayaran
                                </option>

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
                            class="btn btn-checkout w-100 {{ $sale->status == 'COMPLETED' ? 'disabled' : '' }}">

                            ✅ Checkout & Selesaikan

                        </button>

                    </form>



                    {{-- BATALKAN --}}

                    @can('delete',$sale)

                        <form
                            action="{{ route('penjualan.destroy',$sale->id) }}"
                            method="POST"
                            class="mt-2"
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

</div>

@endsection