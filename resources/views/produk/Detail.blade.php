@extends('layouts.app')

@section('title','Detail Produk')

@section('content')

@include('layouts.navbar')

<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

body{
    background:#f5f7fb;
    font-family:'Plus Jakarta Sans',sans-serif;
    color:#334155;
}

/*================ HEADER ================*/

.page-header{
    background:linear-gradient(135deg,#f472b6,#8b5cf6);
    border-radius:22px;
    padding:30px 35px;
    color:white;
    margin-bottom:35px;
    box-shadow:0 18px 40px rgba(168,85,247,.25);
}

.page-header h2{
    font-weight:700;
    margin-bottom:5px;
}

.page-header p{
    color:rgba(255,255,255,.9);
    margin:0;
}

.header-icon{
    width:70px;
    height:70px;
    border-radius:18px;
    background:rgba(255,255,255,.15);
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:32px;
    margin-right:18px;
}

/*================ CARD ================*/

.detail-card{
    background:white;
    border-radius:24px;
    overflow:hidden;
    box-shadow:
        0 20px 50px rgba(0,0,0,.05),
        0 10px 30px rgba(236,72,153,.08);
}

/*================ FOTO ================*/

.product-image{
    background:#fff0f8;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:35px;
    min-height:420px;
}

.product-image img{
    width:100%;
    max-width:330px;
    border-radius:18px;
    transition:.4s;
}

.product-image img:hover{
    transform:scale(1.05);
}

/*================ INFO ================*/

.product-info{
    padding:35px;
}

.product-id{

    display:inline-block;
    background:#fdf2f8;
    color:#ec4899;
    padding:7px 16px;
    border-radius:30px;
    font-size:14px;
    font-weight:600;
    margin-bottom:15px;

}

.product-title{
    font-size:2rem;
    font-weight:700;
    color:#1f2937;
    margin-bottom:25px;
}

.info-card{

    background:#fafafa;
    border:2px solid #f3f4f6;
    border-radius:18px;
    padding:20px;

}

.info-item{

    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:14px 0;
    border-bottom:1px dashed #e5e7eb;

}

.info-item:last-child{
    border-bottom:none;
}

.info-label{

    color:#6b7280;
    font-size:14px;
    font-weight:600;

}

.info-value{

    font-weight:700;
    font-size:17px;

}

/*================ HARGA ================*/

.buy-price{
    color:#3b82f6;
}

.sell-price{
    color:#22c55e;
    font-size:22px;
}

/*================ BADGE ================*/

.stock-good{

    background:#dcfce7;
    color:#15803d;
    padding:7px 18px;
    border-radius:30px;
    font-weight:700;

}

.stock-low{

    background:#fef3c7;
    color:#b45309;
    padding:7px 18px;
    border-radius:30px;
    font-weight:700;

}

/*================ BUTTON ================*/

.btn-back{

    background:white;
    border:2px solid #e5e7eb;
    color:#64748b;
    padding:12px 28px;
    border-radius:14px;
    text-decoration:none;
    font-weight:600;
    transition:.3s;

}

.btn-back:hover{

    background:#fdf2f8;
    border-color:#f9a8d4;
    color:#ec4899;

}

.btn-edit{

    background:linear-gradient(135deg,#f472b6,#8b5cf6);
    color:white;
    border:none;
    padding:12px 30px;
    border-radius:14px;
    text-decoration:none;
    font-weight:600;
    transition:.3s;

}

.btn-edit:hover{

    transform:translateY(-3px);
    color:white;
    box-shadow:0 12px 25px rgba(168,85,247,.35);

}

@media(max-width:768px){

.product-image{
    min-height:280px;
}

.product-info{
    padding:25px;
}

.product-title{
    font-size:1.6rem;
}

}
</style>

<div class="container py-4">

<div class="page-header d-flex justify-content-between align-items-center flex-wrap">

<div class="d-flex align-items-center">

<div class="header-icon">
🌸
</div>

<div>

<h2>Detail Produk</h2>

<p>Informasi lengkap mengenai produk Bouquet POS.</p>

</div>

</div>

<a href="{{ route('produk.index') }}" class="btn btn-back mt-3 mt-md-0">

← Kembali

</a>

</div>

<div class="detail-card">

<div class="row g-0">

<div class="col-lg-5">

<div class="product-image">

@if($produk->foto)

<img src="{{ asset('storage/'.$produk->foto) }}" alt="{{ $produk->nama }}">

@else

<div class="text-center text-muted">

<div style="font-size:90px;">🌸</div>

<h5>Tidak Ada Gambar</h5>

</div>

@endif

</div>

</div>

<div class="col-lg-7">

<div class="product-info">

<span class="product-id">

Produk #{{ $produk->id }}

</span>

<h2 class="product-title">

{{ $produk->nama }}

</h2>

<div class="info-card">

<div class="info-item">

<span class="info-label">

Harga Beli

</span>

<span class="info-value buy-price">

Rp {{ number_format($produk->harga_beli,0,',','.') }}

</span>

</div>

<div class="info-item">

<span class="info-label">

Harga Jual

</span>

<span class="info-value sell-price">

Rp {{ number_format($produk->harga_jual,0,',','.') }}

</span>

</div>

<div class="info-item">

<span class="info-label">

Stok

</span>

@if($produk->stok>5)

<span class="stock-good">

{{ $produk->stok }} pcs

</span>

@else

<span class="stock-low">

{{ $produk->stok }} pcs

</span>

@endif

</div>

<div class="info-item">

<span class="info-label">

Penginput

</span>

<span class="info-value">

👤 {{ $produk->user->name ?? 'Sistem' }}

</span>

</div>

</div>

<div class="d-flex gap-3 mt-4">

<a href="{{ route('produk.index') }}" class="btn btn-back">

Kembali

</a>

@if(Route::has('produk.edit'))

<a href="{{ route('produk.edit',$produk->id) }}" class="btn btn-edit">

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