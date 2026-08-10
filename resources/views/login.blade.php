@extends('layouts.app')

@section('title', 'Login')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: 'Plus Jakarta Sans', sans-serif;
        background: #fdf2f7;
        color: #374151;
    }

    .login-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .login-card {
        width: 100%;
        max-width: 420px;
        background: #ffffff;
        border-radius: 18px;
        padding: 40px;
        box-shadow: 0 8px 30px rgba(214, 51, 132, 0.10);
    }

    .login-header {
        text-align: center;
        margin-bottom: 32px;
    }

    .flower-icon {
        width: 58px;
        height: 58px;
        margin: 0 auto 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fce7f3;
        border-radius: 50%;
        font-size: 28px;
    }

    .login-header h1 {
        margin: 0;
        font-size: 25px;
        font-weight: 700;
        color: #d63384;
    }

    .login-header p {
        margin: 8px 0 0;
        font-size: 14px;
        color: #6b7280;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        font-weight: 600;
        color: #374151;
    }

    .form-control {
        width: 100%;
        height: 48px;
        padding: 0 15px;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        outline: none;
        font-family: inherit;
        font-size: 14px;
        color: #374151;
        background: #fff;
        transition: 0.2s;
    }

    .form-control:focus {
        border-color: #e83e8c;
        box-shadow: 0 0 0 3px rgba(232, 62, 140, 0.08);
    }

    .form-control::placeholder {
        color: #9ca3af;
    }

    .btn-login {
        width: 100%;
        height: 48px;
        border: none;
        border-radius: 10px;
        background: #d63384;
        color: white;
        font-family: inherit;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-login:hover {
        background: #c22575;
    }

    .error-message {
        margin-top: 6px;
        font-size: 12px;
        color: #dc3545;
    }

    .is-invalid {
        border-color: #dc3545 !important;
    }

    .login-footer {
        margin-top: 25px;
        text-align: center;
        font-size: 12px;
        color: #9ca3af;
    }

    @media (max-width: 480px) {
        .login-card {
            padding: 30px 25px;
        }
    }
</style>

<div class="login-wrapper">

    <div class="login-card">

        <div class="login-header">

            <div class="flower-icon">
                🌷
            </div>

            <h1>Bouquet Store</h1>

            <p>Silakan masuk untuk melanjutkan</p>

        </div>

        <form action="{{ route('auth') }}" method="POST">

            @csrf

            <div class="form-group">

                <label class="form-label">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="Masukkan email"
                    autofocus
                >

                @error('email')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="form-group">

                <label class="form-label">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Masukkan password"
                >

                @error('password')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <button type="submit" class="btn-login">
                Login
            </button>

        </form>

        <div class="login-footer">
            © {{ date('Y') }} Bouquet Store
        </div>

    </div>

</div>

@endsection