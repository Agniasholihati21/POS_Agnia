@extends('layouts.app')

@section('title', 'Tambah Produk')

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
    padding: 1.8rem;
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(30, 30, 56, 0.15);
    margin-bottom: 2rem;
  }

  /* Form Card Container */
  .form-card {
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.04);
    padding: 2.2rem;
    border: 1px solid #e2e8f0;
    max-width: 850px;
    margin: 0 auto;
  }

  /* Styling Form Input (Otomatis menerapkan ke partial _form.blade.php) */
  .form-card .form-label {
    font-weight: 600;
    color: #475569;
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
  }

  .form-card .form-control,
  .form-card .form-select,
  .form-card textarea {
    border-radius: 10px;
    border: 1px solid #cbd5e1;
    padding: 0.65rem 1rem;
    font-size: 0.95rem;
    transition: all 0.2s ease;
  }

  .form-card .form-control:focus,
  .form-card .form-select:focus,
  .form-card textarea:focus {
    border-color: #6366f1;
    box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15);
  }

  /* Custom Styling Input File / Upload Gambar */
  .form-card input[type="file"] {
    background-color: #f8fafc;
    padding: 0.5rem;
    cursor: pointer;
  }

  .form-card input[type="file"]::file-selector-button {
    background: #6366f1;
    color: white;
    border: none;
    padding: 0.4rem 0.8rem;
    border-radius: 6px;
    font-weight: 600;
    margin-right: 1rem;
    transition: background 0.2s ease;
  }

  .form-card input[type="file"]::file-selector-button:hover {
    background: #4f46e5;
  }

  /* Buttons */
  .btn-save {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
    border: none;
    border-radius: 10px;
    padding: 0.7rem 1.8rem;
    font-weight: 600;
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.25);
    transition: all 0.2s ease;
  }

  .btn-save:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(16, 185, 129, 0.35);
    color: white;
  }

  .btn-back {
    background-color: #f1f5f9;
    color: #64748b;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    padding: 0.7rem 1.5rem;
    font-weight: 600;
    transition: all 0.2s ease;
    text-decoration: none;
  }

  .btn-back:hover {
    background-color: #e2e8f0;
    color: #334155;
  }
</style>

<div class="container my-4">
  <div class="page-header d-flex justify-content-between align-items-center flex-wrap">
    <div>
      <h2 class="fw-bold m-0">📦 Tambah Produk Baru</h2>
      <p class="text-white-50 m-0 mt-1">Isi formulir di bawah untuk menambahkan produk baru ke sistem</p>
    </div>
    <a href="{{ route('produk.index') }}" class="btn btn-back mt-2 mt-md-0">
      ← Kembali
    </a>
  </div>

  <div class="form-card">
    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      @include('Produk._form')

      <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
        <a href="{{ route('produk.index') }}" class="btn btn-back">Batal</a>
        <button type="submit" class="btn btn-save">💾 Simpan Produk</button>
      </div>
    </form>
  </div>
</div>

@endsection