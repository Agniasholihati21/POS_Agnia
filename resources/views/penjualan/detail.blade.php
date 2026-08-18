@extends('layouts.app')

@section('title', 'Detail Penjualan')

@section('content')

@include('layouts.navbar')

<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

body{
    background:#f4f7fc;
    font-family:'Plus Jakarta Sans',sans-serif;
    color:#334155;
}

/* =========================
   HEADER
========================= */

.page-header{
    background:linear-gradient(135deg,#e78d9b,#e78d9b);
    border-radius:25px;
    padding:28px 35px;
    color:#fff;
    box-shadow:0 18px 35px rgba(139,92,246,.25);
    margin-bottom:25px;
}

.page-header h2{
    font-weight:800;
    font-size:34px;
    margin:0;
}

.page-header p{
    margin:5px 0 0;
    opacity:.9;
    font-size:15px;
}


/* =========================
   BACK BUTTON
========================= */

.btn-back{
    background:#fff;
    color:#e78d9b;
    border-radius:12px;
    padding:10px 20px;
    border:none;
    font-weight:700;
    text-decoration:none;
    transition:.2s;
}

.btn-back:hover{
    background:#eef2ff;
    color:#e78d9b;
}


/* =========================
   MAIN INVOICE
========================= */

.invoice-card{
    background:#fff;
    border-radius:25px;
    box-shadow:0 15px 35px rgba(0,0,0,.05);
    overflow:hidden;
    margin-bottom:25px;
}


/* =========================
   INVOICE TOP
========================= */

.invoice-top{
    padding:30px 35px;
    border-bottom:1px solid #edf0f4;
}

.invoice-title{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
}

.invoice-title h4{
    margin:0;
    font-size:24px;
    font-weight:800;
    color:#334155;
}

.invoice-title p{
    margin:6px 0 0;
    color:#64748b;
    font-size:13px;
}


/* =========================
   INFO TRANSAKSI
========================= */

.transaction-info{
    display:flex;
    margin-top:25px;
    border:1px solid #edf0f4;
    border-radius:15px;
    overflow:hidden;
}

.info-item{
    flex:1;
    padding:18px 20px;
    border-right:1px solid #edf0f4;
}

.info-item:last-child{
    border-right:none;
}

.info-label{
    display:block;
    color:#64748b;
    font-size:11px;
    font-weight:700;
    text-transform:uppercase;
    letter-spacing:.5px;
    margin-bottom:6px;
}

.info-value{
    color:#334155;
    font-size:15px;
    font-weight:700;
}

.info-value.total{
    color:#10b981;
    font-size:18px;
}


/* =========================
   PRODUCT AREA
========================= */

.product-area{
    padding:30px 35px;
}

.product-heading{
    display:flex;
    align-items:center;
    justify-content:space-between;
    margin-bottom:18px;
}

.product-heading h4{
    margin:0;
    font-size:20px;
    font-weight:800;
}

.product-heading span{
    color:#64748b;
    font-size:12px;
}


/* =========================
   PRODUCT ITEM
========================= */

.product-item{
    display:flex;
    align-items:center;
    gap:18px;

    padding:15px;

    border:1px solid #edf0f4;
    border-radius:15px;

    margin-bottom:10px;

    background:#fff;

    transition:.2s;
}

.product-item:hover{
    background:#fffafb;
    border-color:#f0d2d8;
}

.product-number{
    width:28px;
    height:28px;

    display:flex;
    align-items:center;
    justify-content:center;

    background:#eef2ff;
    color:#e78d9b;

    border-radius:8px;

    font-size:12px;
    font-weight:700;

    flex-shrink:0;
}

.product-image{
    width:65px;
    height:65px;

    object-fit:cover;

    border-radius:12px;

    border:1px solid #edf0f4;

    flex-shrink:0;
}

.product-placeholder{
    width:65px;
    height:65px;

    display:flex;
    align-items:center;
    justify-content:center;

    background:#f8fafc;

    border-radius:12px;

    color:#94a3b8;

    font-size:22px;

    flex-shrink:0;
}

.product-detail{
    flex:1;
}

.product-name{
    font-size:15px;
    font-weight:700;
    color:#334155;
}

.product-id{
    margin-top:4px;
    font-size:11px;
    color:#64748b;
}

.product-qty{
    text-align:center;
    width:70px;
}

.qty-label{
    display:block;
    font-size:10px;
    color:#64748b;
    text-transform:uppercase;
    margin-bottom:5px;
}

.qty-value{
    display:inline-flex;

    min-width:32px;
    height:28px;

    align-items:center;
    justify-content:center;

    background:#eef2ff;
    color:#2563eb;

    border-radius:8px;

    font-size:12px;
    font-weight:700;
}

.product-price{
    width:140px;
    text-align:right;
}

.price-label{
    display:block;
    font-size:10px;
    color:#64748b;
    margin-bottom:5px;
}

.price-value{
    font-size:13px;
    font-weight:600;
    color:#334155;
}

.product-total{
    width:150px;
    text-align:right;
}

.total-label{
    display:block;
    font-size:10px;
    color:#64748b;
    margin-bottom:5px;
}

.total-value{
    font-size:15px;
    font-weight:800;
    color:#10b981;
}


/* =========================
   TOTAL AREA
========================= */

.total-area{
    margin-top:25px;

    display:flex;
    justify-content:flex-end;
}

.total-box{
    width:320px;

    padding-top:18px;

    border-top:2px solid #e78d9b;
}

.total-row{
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.total-row span:first-child{
    font-size:14px;
    font-weight:700;
    color:#64748b;
}

.final-total{
    color:#10b981;
    font-size:24px;
    font-weight:800;
}


/* =========================
   FOOTER
========================= */

.invoice-footer{
    padding:20px 35px;

    background:#f8fafc;

    display:flex;
    justify-content:space-between;
    align-items:center;
}

.success-message{
    display:flex;
    align-items:center;
    gap:12px;
}

.success-icon{
    width:38px;
    height:38px;

    background:#e78d9b;
    color:#fff;

    border-radius:50%;

    display:flex;
    align-items:center;
    justify-content:center;
}

.success-title{
    margin:0;
    font-size:14px;
    font-weight:700;
}

.success-text{
    margin:3px 0 0;
    font-size:11px;
    color:#64748b;
}


/* =========================
   EMPTY
========================= */

.empty-product{
    text-align:center;
    padding:40px 20px;
    color:#64748b;
}

.empty-product i{
    font-size:35px;
    color:#e78d9b;
}

.empty-product h5{
    margin:10px 0 4px;
    font-size:16px;
}

.empty-product p{
    margin:0;
    font-size:12px;
}


/* =========================
   RESPONSIVE
========================= */

@media(max-width:768px){

    .page-header{
        padding:22px;
    }

    .page-header h2{
        font-size:27px;
    }

    .page-header{
        display:block !important;
    }

    .page-header .btn-back{
        display:inline-block;
        margin-top:15px;
    }

    .invoice-top,
    .product-area{
        padding:22px;
    }

    .transaction-info{
        flex-direction:column;
    }

    .info-item{
        border-right:none;
        border-bottom:1px solid #edf0f4;
    }

    .info-item:last-child{
        border-bottom:none;
    }

    .product-item{
        flex-wrap:wrap;
    }

    .product-detail{
        min-width:calc(100% - 130px);
    }

    .product-qty,
    .product-price,
    .product-total{
        width:auto;
        flex:1;
        text-align:left;
    }

    .total-area{
        justify-content:stretch;
    }

    .total-box{
        width:100%;
    }

    .invoice-footer{
        padding:20px;
        flex-direction:column;
        align-items:flex-start;
        gap:15px;
    }
}

</style>


<div class="container my-4">


    {{-- =========================
         HEADER
    ========================== --}}

    <div class="page-header d-flex justify-content-between align-items-center">

        <div>

            <h2>
                <i class="bi bi-receipt me-2"></i>
                Detail Penjualan
            </h2>

            <p>
                Informasi lengkap transaksi penjualan produk bouquet.
            </p>

        </div>

        <a href="{{ route('penjualan.index') }}"
           class="btn btn-back">

            <i class="bi bi-arrow-left me-1"></i>
            Kembali

        </a>

    </div>



    {{-- =========================
         INVOICE
    ========================== --}}

    <div class="invoice-card">


        {{-- =====================
             INFORMASI TRANSAKSI
        ====================== --}}

        <div class="invoice-top">

            <div class="invoice-title">

                <div>

                    <h4>
                        Ringkasan Transaksi
                    </h4>

                    <p>
                        Informasi transaksi penjualan
                    </p>

                </div>

            </div>


            <div class="transaction-info">


                {{-- KASIR --}}

                <div class="info-item">

                    <span class="info-label">
                        Kasir
                    </span>

                    <div class="info-value">

                        <i class="bi bi-person me-1"></i>

                        {{ $sale->user->name ?? 'Sistem' }}

                    </div>

                </div>


                {{-- TANGGAL --}}

                <div class="info-item">

                    <span class="info-label">
                        Tanggal Transaksi
                    </span>

                    <div class="info-value">

                        <i class="bi bi-calendar3 me-1"></i>

                        {{ $sale->created_at->translatedFormat('d F Y') }}

                        <span class="text-muted ms-1">

                            {{ $sale->created_at->format('H:i') }} WIB

                        </span>

                    </div>

                </div>


                {{-- TOTAL --}}

                <div class="info-item">

                    <span class="info-label">
                        Total Pembayaran
                    </span>

                    <div class="info-value total">

                        Rp {{ number_format($sale->total_pembayaran,0,',','.') }}

                    </div>

                </div>


            </div>

        </div>



        {{-- =====================
             PRODUK
        ====================== --}}

        <div class="product-area">

            <div class="product-heading">

                <h4>
                    Daftar Produk
                </h4>

                <span>
                    {{ $sale->itempenjualan->count() }} produk
                </span>

            </div>


            @forelse($sale->itempenjualan as $index => $item)

                <div class="product-item">


                    {{-- NOMOR --}}

                    <div class="product-number">

                        {{ $index + 1 }}

                    </div>


                    {{-- FOTO --}}

                    @if($item->produk && $item->produk->foto)

                        <img
                            src="{{ asset('storage/'.$item->produk->foto) }}"
                            class="product-image"
                            alt="{{ $item->produk->nama }}">

                    @else

                        <div class="product-placeholder">

                            <i class="bi bi-box"></i>

                        </div>

                    @endif


                    {{-- DETAIL --}}

                    <div class="product-detail">

                        <div class="product-name">

                            {{ $item->produk->nama ?? 'Produk Dihapus' }}

                        </div>

                        <div class="product-id">

                            ID Produk :
                            {{ $item->produk->id ?? '-' }}

                        </div>

                    </div>


                    {{-- QTY --}}

                    <div class="product-qty">

                        <span class="qty-label">
                            Qty
                        </span>

                        <span class="qty-value">

                            {{ $item->kuantitas }}

                        </span>

                    </div>


                    {{-- HARGA --}}

                    <div class="product-price">

                        <span class="price-label">
                            Harga
                        </span>

                        <span class="price-value">

                            Rp {{ number_format($item->produk->harga_jual ?? 0,0,',','.') }}

                        </span>

                    </div>


                    {{-- SUBTOTAL --}}

                    <div class="product-total">

                        <span class="total-label">
                            Subtotal
                        </span>

                        <span class="total-value">

                            Rp {{ number_format($item->subtotal,0,',','.') }}

                        </span>

                    </div>


                </div>

            @empty

                <div class="empty-product">

                    <i class="bi bi-box-seam"></i>

                    <h5>
                        Tidak ada produk
                    </h5>

                    <p>
                        Tidak ada produk dalam transaksi ini.
                    </p>

                </div>

            @endforelse



            {{-- =====================
                 TOTAL
            ====================== --}}

            <div class="total-area">

                <div class="total-box">

                    <div class="total-row">

                        <span>
                            Total Pembayaran
                        </span>

                        <span class="final-total">

                            Rp {{ number_format($sale->total_pembayaran,0,',','.') }}

                        </span>

                    </div>

                </div>

            </div>

        </div>



        {{-- =====================
             FOOTER
        ====================== --}}

        <div class="invoice-footer">

            <div class="success-message">

                <div class="success-icon">

                    <i class="bi bi-check-lg"></i>

                </div>

                <div>

                    <p class="success-title">
                        Transaksi Berhasil
                    </p>

                    <p class="success-text">
                        Terima kasih telah menggunakan Bouquet Point of Sale.
                    </p>

                </div>

            </div>


            <a href="{{ route('penjualan.index') }}"
               class="btn-back">

                <i class="bi bi-arrow-left me-1"></i>

                Kembali ke Daftar Penjualan

            </a>

        </div>


    </div>

</div>

@endsection
