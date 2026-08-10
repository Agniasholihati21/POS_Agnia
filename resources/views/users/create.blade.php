@extends('layouts.app')

@section('title', 'Tambah Pengguna')

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
    background:linear-gradient(135deg,#f472b6 0%,#a855f7 100%);
    border-radius:22px;
    padding:30px 35px;
    margin-bottom:35px;
    color:white;
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
    background:white;
    border-radius:24px;
    padding:40px;
    max-width:900px;
    margin:auto;
    box-shadow:
        0 20px 50px rgba(0,0,0,.05),
        0 10px 30px rgba(236,72,153,.08);
}

/* ================= FORM ================= */

.form-label{
    color:#374151;
    font-weight:600;
    margin-bottom:8px;
}

.form-control,
.form-select{

    height:55px;
    border-radius:14px;
    border:2px solid #e5e7eb;
    background:#fafafa;
    transition:.3s;
    font-size:15px;

}

.form-control:hover,
.form-select:hover{

    border-color:#f9a8d4;

}

.form-control:focus,
.form-select:focus{

    background:white;
    border-color:#ec4899;
    box-shadow:0 0 0 .25rem rgba(236,72,153,.15);

}

/* ================= BUTTON ================= */

.btn-save{

    background:linear-gradient(135deg,#f472b6,#8b5cf6);
    border:none;
    color:white;
    font-weight:600;
    padding:13px 28px;
    border-radius:14px;
    transition:.3s;

}

.btn-save:hover{

    transform:translateY(-3px);
    color:white;
    box-shadow:0 12px 25px rgba(168,85,247,.35);

}

.btn-back{

    background:white;
    border:2px solid #e5e7eb;
    color:#64748b;
    font-weight:600;
    padding:13px 28px;
    border-radius:14px;
    transition:.3s;
    text-decoration:none;

}

.btn-back:hover{

    background:#fdf2f8;
    border-color:#f9a8d4;
    color:#ec4899;

}

/* ================= HR ================= */

.border-top{

    border-color:#eef2f7 !important;

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
                👤
            </div>

            <div>

                <h2>Tambah Pengguna Baru</h2>

                <p>
                    Tambahkan akun pengguna baru dan tentukan hak aksesnya.
                </p>

            </div>

        </div>

        <a href="{{ route('admin.users') }}" class="btn btn-back mt-3 mt-md-0">
            ← Kembali
        </a>

    </div>



    <div class="form-card">

        <form action="{{ route('admin.users.store') }}" method="POST">

            @csrf

            @include('users._form')

            <div class="d-flex justify-content-end gap-3 mt-4 pt-4 border-top">

                <a href="{{ route('admin.users') }}" class="btn btn-back">

                    Batal

                </a>

                <button type="submit" class="btn btn-save">

                    💾 Simpan 

                </button>

            </div>

        </form>

    </div>

</div>

@endsection