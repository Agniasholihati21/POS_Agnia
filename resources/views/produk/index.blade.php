@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')

@include('layouts.navbar')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
    rel="stylesheet">

<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<style>

/* =====================================================
   GLOBAL
===================================================== */

:root {
    --bg: #faf6f0;
    --card: #ffffff;
    --pink: #e88a9a;
    --pink-dark: #c2596c;
    --pink-light: #fff2f5;
    --pink-soft: #fff7f9;

    --green: #16805f;
    --green-bg: #f0faf5;

    --yellow: #a16c00;
    --yellow-bg: #fff8e7;

    --red: #d93838;
    --red-bg: #fff1f1;

    --text: #2d2527;
    --muted: #8c827a;

    --border: #f3e4e8;
}


body {
    background: var(--bg);
    color: var(--text);
    font-family: 'Plus Jakarta Sans', sans-serif;
}


/* =====================================================
   PAGE
===================================================== */

.product-page {
    padding: 25px 15px 40px;
}


/* =====================================================
   HEADER
===================================================== */

.product-header {
    background: linear-gradient(
        135deg,
        #e88a9a,
        #e78d9b
    );

    border-radius: 22px;

    padding: 25px 30px;

    margin-bottom: 25px;

    color: white;

    box-shadow:
        0 12px 30px rgba(232, 138, 154, .22);

    position: relative;

    overflow: hidden;
}


.product-header::after {
    content: "";

    position: absolute;

    width: 220px;
    height: 220px;

    right: -70px;
    top: -100px;

    background: rgba(255,255,255,.12);

    border-radius: 50%;
}


.product-header h2 {
    font-family: 'Playfair Display', serif;

    font-size: 32px;

    font-weight: 700;

    margin: 0;

    position: relative;

    z-index: 2;
}


.product-header p {
    margin: 6px 0 0;

    font-size: 14px;

    opacity: .95;

    position: relative;

    z-index: 2;
}


.product-header-icon {
    font-size: 60px;

    opacity: .2;

    position: relative;

    z-index: 2;
}


/* =====================================================
   MAIN CARD
===================================================== */

.product-container {
    background: white;

    border: 1px solid var(--border);

    border-radius: 22px;

    padding: 25px;

    box-shadow:
        0 8px 25px rgba(232,138,154,.08);
}


/* =====================================================
   TOP TOOLBAR
===================================================== */

.product-toolbar {
    display: flex;

    justify-content: space-between;

    align-items: center;

    gap: 20px;

    margin-bottom: 25px;
}


.btn-create-product {

    display: inline-flex;

    align-items: center;

    gap: 8px;

    background:
        linear-gradient(
            135deg,
            #ff8ea3,
            #e86b83
        );

    color: white;

    border: none;

    border-radius: 13px;

    padding: 12px 20px;

    font-size: 14px;

    font-weight: 700;

    text-decoration: none;

    box-shadow:
        0 7px 18px rgba(232,107,131,.25);

    transition: .25s;
}


.btn-create-product:hover {

    color: white;

    transform: translateY(-2px);

    box-shadow:
        0 10px 24px rgba(232,107,131,.35);
}


.search-product {

    width: 360px;

    height: 46px;

    border-radius: 12px 0 0 12px;

    border: 1px solid var(--border);

    background: var(--pink-soft);

    padding-left: 15px;

    font-size: 14px;
}


.search-product:focus {

    border-color: var(--pink);

    box-shadow: none;

    background: white;
}


.btn-search-product {

    height: 46px;

    border: none;

    padding: 0 20px;

    border-radius: 0 12px 12px 0;

    background:
        linear-gradient(
            135deg,
            #e88a9a,
            #d46a7e
        );

    color: white;

    font-weight: 700;
}


.btn-search-product:hover {

    color: white;

    background:
        linear-gradient(
            135deg,
            #d46a7e,
            #c2596c
        );
}


/* =====================================================
   PRODUCT GRID
===================================================== */

.product-grid {

    display: grid;

    grid-template-columns:
        repeat(3, minmax(0, 1fr));

    gap: 20px;
}


/* =====================================================
   PRODUCT CARD
===================================================== */

.product-card {

    background: white;

    border: 1px solid var(--border);

    border-radius: 18px;

    overflow: hidden;

    transition:
        transform .25s ease,
        box-shadow .25s ease,
        border-color .25s ease;

    position: relative;
}


.product-card:hover {

    transform: translateY(-5px);

    border-color: #f1cbd3;

    box-shadow:
        0 15px 35px rgba(232,138,154,.15);
}


/* =====================================================
   PRODUCT IMAGE
===================================================== */

.product-image-wrapper {

    height: 190px;

    background:
        linear-gradient(
            135deg,
            #fff4f6,
            #fffafa
        );

    display: flex;

    align-items: center;

    justify-content: center;

    overflow: hidden;

    position: relative;
}


.product-image {

    width: 100%;

    height: 100%;

    object-fit: cover;

    transition: transform .35s ease;
}


.product-card:hover .product-image {

    transform: scale(1.06);
}


.product-no-image {

    width: 100%;

    height: 100%;

    display: flex;

    align-items: center;

    justify-content: center;

    flex-direction: column;

    color: var(--pink);

    background: #fff7f9;
}


.product-no-image i {

    font-size: 48px;
}


.product-no-image span {

    font-size: 12px;

    margin-top: 5px;

    color: var(--muted);
}


/* =====================================================
   STOCK BADGE
===================================================== */

.stock-badge {

    position: absolute;

    top: 12px;

    right: 12px;

    padding: 6px 10px;

    border-radius: 30px;

    font-size: 11px;

    font-weight: 700;

    backdrop-filter: blur(5px);
}


.stock-safe {

    background: rgba(240,250,245,.95);

    color: var(--green);

    border: 1px solid #c3e6d0;
}


.stock-low {

    background: rgba(255,248,231,.95);

    color: var(--yellow);

    border: 1px solid #ffe29d;
}


/* =====================================================
   PRODUCT BODY
===================================================== */

.product-body {

    padding: 18px;
}


.product-number {

    color: var(--pink);

    font-size: 11px;

    font-weight: 700;

    margin-bottom: 4px;

    text-transform: uppercase;

    letter-spacing: .5px;
}


.product-name {

    font-size: 19px;

    font-weight: 800;

    color: var(--text);

    margin-bottom: 8px;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;
}


/* =====================================================
   INPUT USER
===================================================== */

.product-user {

    display: flex;

    align-items: center;

    gap: 6px;

    color: var(--muted);

    font-size: 12px;

    margin-bottom: 16px;
}


.product-user i {

    color: var(--pink);

    font-size: 14px;
}


/* =====================================================
   PRICE
===================================================== */

.price-wrapper {

    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 10px;

    margin-bottom: 15px;
}


.price-box {

    background: #fff8fa;

    border: 1px solid #f7e7eb;

    border-radius: 10px;

    padding: 9px 10px;
}


.price-label {

    display: block;

    font-size: 10px;

    color: var(--muted);

    margin-bottom: 4px;

    text-transform: uppercase;

    font-weight: 700;
}


.price-buy {

    font-size: 13px;

    font-weight: 700;

    color: #6b625e;
}


.price-sell {

    font-size: 13px;

    font-weight: 800;

    color: var(--pink-dark);
}


/* =====================================================
   CARD FOOTER
===================================================== */

.product-footer {

    display: flex;

    justify-content: space-between;

    align-items: center;

    gap: 10px;

    border-top: 1px solid var(--border);

    padding-top: 14px;
}


.stock-info {

    font-size: 12px;

    font-weight: 700;
}


.stock-info i {

    margin-right: 3px;
}


/* =====================================================
   ACTION BUTTONS
===================================================== */

.product-actions {

    display: flex;

    gap: 5px;
}


.action-btn {

    width: 34px;

    height: 34px;

    border-radius: 9px;

    display: flex;

    align-items: center;

    justify-content: center;

    text-decoration: none;

    border: 1px solid;

    transition: .2s;

    font-size: 14px;
}


/* DETAIL */

.action-detail {

    color: #b85bb8;

    background: #fff0fa;

    border-color: #f5d3f5;
}


.action-detail:hover {

    color: #8c328c;

    background: #f5d3f5;
}


/* EDIT */

.action-edit {

    color: #9a6b00;

    background: #fff8e7;

    border-color: #ffe29d;
}


.action-edit:hover {

    color: #704e00;

    background: #ffe29d;
}


/* DELETE */

.action-delete {

    color: #d93838;

    background: #fff0f0;

    border-color: #ffcdcd;
}


.action-delete:hover {

    color: #b02020;

    background: #ffcdcd;
}


/* =====================================================
   EMPTY
===================================================== */

.empty-product {

    grid-column: 1 / -1;

    text-align: center;

    padding: 70px 20px;

    color: var(--muted);
}


.empty-product i {

    font-size: 65px;

    color: #e8c3ca;
}


.empty-product h5 {

    margin-top: 15px;

    font-weight: 700;

    color: #6f6461;
}


/* =====================================================
   PAGINATION
===================================================== */

.pagination-wrapper {

    margin-top: 25px;
}


.pagination {

    margin-bottom: 0;
}


.page-link {

    color: var(--pink-dark);

    border-color: var(--border);
}


.page-item.active .page-link {

    background-color: var(--pink);

    border-color: var(--pink);
}


/* =====================================================
   RESPONSIVE
===================================================== */

@media (max-width: 1200px) {

    .product-grid {

        grid-template-columns:
            repeat(2, minmax(0, 1fr));
    }

}


@media (max-width: 768px) {

    .product-page {

        padding: 15px 10px 30px;
    }


    .product-header {

        padding: 20px;
    }


    .product-header h2 {

        font-size: 25px;
    }


    .product-container {

        padding: 15px;
    }


    .product-toolbar {

        flex-direction: column;

        align-items: stretch;
    }


    .search-product {

        width: 100%;
    }


    .product-grid {

        grid-template-columns: 1fr;

        gap: 15px;
    }

}

</style>


<div class="product-page">


    {{-- =================================================
         HEADER
    ================================================= --}}

    <div class="product-header
                d-flex
                justify-content-between
                align-items-center">

        <div>

            <h2>
                🌸 Produk
            </h2>

            <p>
                Kelola koleksi buket, stok, dan harga produk.
            </p>

        </div>

        <div class="product-header-icon d-none d-md-block">

            <i class="bi bi-flower1"></i>

        </div>

    </div>



    {{-- =================================================
         MAIN CONTAINER
    ================================================= --}}

    <div class="product-container">


        {{-- =================================================
             TOOLBAR
        ================================================= --}}

        <div class="product-toolbar">


            {{-- TAMBAH PRODUK --}}

            <div>

                @can('create', App\Models\Produk::class)

                    <a
                        href="{{ route('produk.create') }}"
                        class="btn-create-product">

                        <i class="bi bi-plus-circle-fill"></i>

                        Tambah Produk Baru

                    </a>

                @endcan

            </div>



            {{-- SEARCH --}}

            <form
                action="{{ route('produk.index') }}"
                method="GET">

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control search-product"
                        placeholder="Cari nama produk...">

                    <button
                        class="btn-search-product"
                        type="submit">

                        <i class="bi bi-search"></i>

                        Cari

                    </button>

                </div>

            </form>


        </div>



        {{-- =================================================
             PRODUCT GRID
        ================================================= --}}

        <div class="product-grid">


            @forelse ($products as $product)


                <div class="product-card">


                    {{-- =================================================
                         IMAGE
                    ================================================= --}}

                    <div class="product-image-wrapper">


                        @if($product->foto)

                            <img
                                src="{{ asset('storage/'.$product->foto) }}"
                                class="product-image"
                                alt="{{ $product->nama }}">

                        @else

                            <div class="product-no-image">

                                <i class="bi bi-flower1"></i>

                                <span>
                                    Tidak ada foto
                                </span>

                            </div>

                        @endif



                        {{-- STOCK BADGE --}}

                        @if($product->stok > 5)

                            <span class="stock-badge stock-safe">

                                <i class="bi bi-check-circle"></i>

                                Stok {{ $product->stok }}

                            </span>

                        @else

                            <span class="stock-badge stock-low">

                                <i class="bi bi-exclamation-triangle"></i>

                                Stok {{ $product->stok }}

                            </span>

                        @endif


                    </div>



                    {{-- =================================================
                         BODY
                    ================================================= --}}

                    <div class="product-body">


                        <div class="product-number">

                            Produk #{{ $products->firstItem() + $loop->index }}

                        </div>


                        <div
                            class="product-name"
                            title="{{ $product->nama }}">

                            {{ $product->nama }}

                        </div>



                        {{-- USER --}}

                        <div class="product-user">

                            <i class="bi bi-person-circle"></i>

                            <span>

                                {{ $product->user->name ?? 'Sistem' }}

                            </span>

                        </div>



                        {{-- PRICE --}}

                        <div class="price-wrapper">


                            <div class="price-box">

                                <span class="price-label">

                                    Harga Beli

                                </span>

                                <span class="price-buy">

                                    Rp {{ number_format(
                                        $product->harga_beli,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </span>

                            </div>


                            <div class="price-box">

                                <span class="price-label">

                                    Harga Jual

                                </span>

                                <span class="price-sell">

                                    Rp {{ number_format(
                                        $product->harga_jual,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </span>

                            </div>


                        </div>



                        {{-- FOOTER --}}

                        <div class="product-footer">


                            {{-- STOCK --}}

                            <div class="stock-info
                                {{ $product->stok > 5
                                    ? 'text-success'
                                    : 'text-warning' }}">

                                @if($product->stok > 5)

                                    <i class="bi bi-box-seam"></i>

                                    Stok aman

                                @else

                                    <i class="bi bi-exclamation-circle"></i>

                                    Stok rendah

                                @endif

                            </div>



                            {{-- ACTION --}}

                            <div class="product-actions">


                                {{-- DETAIL --}}

                                <a
                                    href="{{ route('produk.show', $product) }}"
                                    class="action-btn action-detail"
                                    title="Detail">

                                    <i class="bi bi-eye"></i>

                                </a>



                                {{-- EDIT --}}

                                @can('update', $product)

                                    <a
                                        href="{{ route('produk.edit', $product) }}"
                                        class="action-btn action-edit"
                                        title="Edit">

                                        <i class="bi bi-pencil-square"></i>

                                    </a>

                                @endcan



                                {{-- DELETE --}}

                                @can('delete', $product)

                                    <form
                                        action="{{ route('produk.destroy', $product) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="action-btn action-delete"
                                            title="Hapus"
                                            onclick="
                                                return confirm(
                                                    'Apakah Anda yakin ingin menghapus produk ini?'
                                                )
                                            ">

                                            <i class="bi bi-trash3"></i>

                                        </button>

                                    </form>

                                @endcan


                            </div>


                        </div>


                    </div>


                </div>


            @empty


                <div class="empty-product">

                    <i class="bi bi-box-seam"></i>

                    <h5>
                        Produk belum tersedia
                    </h5>

                    <p>
                        Silakan tambahkan produk baru.
                    </p>

                </div>


            @endforelse


        </div>



        {{-- =================================================
             PAGINATION
        ================================================= --}}

        <div class="pagination-wrapper">

            {{ $products->links() }}

        </div>


    </div>

</div>

@endsection