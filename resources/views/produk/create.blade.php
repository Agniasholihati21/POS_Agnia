@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')

@include('layouts.navbar')

<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

body{
    background:#f5f7fb;
    font-family:'Plus Jakarta Sans',sans-serif;
    color:#334155;
}

/* ================= HEADER ================= */

.page-header{
    background:linear-gradient(135deg,#e78d9b 0%,#e78d9b 100%);
    border-radius:22px;
    padding:30px 35px;
    margin-bottom:35px;
    color:#fff;
    box-shadow:0 18px 40px rgba(168,85,247,.25);
}

.page-header h2{
    font-size:2rem;
    font-weight:700;
    margin-bottom:5px;
}

.page-header p{
    color:rgba(255,255,255,.9);
    margin:0;
    font-size:15px;
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
    margin-right:20px;
}

/* ================= CARD ================= */

.form-card{
    background:#fff;
    border-radius:24px;
    padding:40px;
    max-width:900px;
    margin:auto;
    box-shadow:
        0 20px 50px rgba(0,0,0,.05),
        0 10px 30px rgba(236,72,153,.08);
}

/* ================= LABEL ================= */

.form-label{
    color:#374151;
    font-weight:600;
    margin-bottom:8px;
}

/* ================= INPUT ================= */

.form-control,
.form-select,
textarea{

    border:2px solid #e5e7eb;
    border-radius:14px;
    background:#fafafa;
    transition:.3s;
    font-size:15px;

}

.form-control,
.form-select{
    height:55px;
}

textarea{
    min-height:120px;
    resize:none;
    padding-top:12px;
}

.form-control:hover,
.form-select:hover,
textarea:hover{

    border-color:#f9a8d4;

}

.form-control:focus,
.form-select:focus,
textarea:focus{

    background:#fff;
    border-color:#ec4899;
    box-shadow:0 0 0 .25rem rgba(236,72,153,.15);

}

/* ================= FILE ================= */

input[type=file]{

    border:2px dashed #f9a8d4;
    border-radius:14px;
    background:#fff0f7;
    padding:15px;

}

input[type=file]::file-selector-button{

    background:linear-gradient(135deg,#e78d9b,#e78d9b);
    color:#fff;
    border:none;
    padding:10px 18px;
    border-radius:10px;
    font-weight:600;
    margin-right:15px;
    transition:.3s;

}

input[type=file]::file-selector-button:hover{

    opacity:.9;

}

/* ================= BUTTON ================= */

.btn-save{

    background:linear-gradient(135deg,#e78d9b,#e78d9b);
    color:#fff;
    border:none;
    border-radius:14px;
    padding:13px 30px;
    font-weight:600;
    transition:.3s;

}

.btn-save:hover{

    transform:translateY(-3px);
    color:#fff;
    box-shadow:0 12px 25px rgba(168,85,247,.35);

}

.btn-back{

    background:#fff;
    border:2px solid #e5e7eb;
    color:#64748b;
    border-radius:14px;
    padding:13px 28px;
    font-weight:600;
    transition:.3s;
    text-decoration:none;

}

.btn-back:hover{

    background:#fdf2f8;
    border-color:#f9a8d4;
    color:#ec4899;

}

.border-top{

    border-color:#eef2f7!important;

}

/* ================= RESPONSIVE ================= */

@media(max-width:768px){

.page-header{

padding:25px;

}

.page-header h2{

font-size:1.6rem;

}

.header-icon{

display:none;

}

.form-card{

padding:25px;

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

                <h2>Tambah Produk Baru</h2>

                <p>
                    Tambahkan produk buket baru lengkap dengan harga, stok, dan gambar produk.
                </p>

            </div>

        </div>

        <a href="{{ route('produk.index') }}" class="btn btn-back mt-3 mt-md-0">

            ← Kembali

        </a>

    </div>

    <div class="form-card">

        <form action="{{ route('produk.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            @include('Produk._form')

            <div class="d-flex justify-content-end gap-3 mt-4 pt-4 border-top">

                <a href="{{ route('produk.index') }}"
                   class="btn btn-back">

                    Batal

                </a>

                <button type="submit"
                        class="btn btn-save">

                     Simpan Produk

                </button>

            </div>

        </form>

    </div>

</div>

@endsection