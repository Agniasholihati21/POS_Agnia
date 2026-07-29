@extends('layouts.app')

@section('title', 'Login')

@section('content')

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

*{
    font-family:'Poppins',sans-serif;
}

body{
    background: linear-gradient(135deg,#ffe4ec,#f8d7ff,#fff5f7);
}

/* Container */
.login-container{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:30px;
}

/* Card */
.login-card{
    width:100%;
    max-width:980px;
    background:#fff;
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 20px 50px rgba(0,0,0,.12);
    display:flex;
}

/* Left Side */
.left-side{
    width:50%;
    background:linear-gradient(135deg,#ff6fa5,#d63384,#8b5cf6);
    color:white;
    padding:60px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    position:relative;
}

.left-side::before{
    content:"🌸";
    position:absolute;
    font-size:180px;
    opacity:.12;
    top:20px;
    right:20px;
}

.left-side h1{
    font-weight:700;
    font-size:42px;
    margin-bottom:15px;
}

.left-side p{
    font-size:16px;
    line-height:1.8;
    opacity:.9;
}

.flower{
    font-size:70px;
    margin-bottom:20px;
}

/* Right Side */
.right-side{
    width:50%;
    padding:55px 45px;
}

.login-title{
    text-align:center;
    margin-bottom:35px;
}

.login-title h2{
    font-weight:700;
    color:#d63384;
}

.login-title p{
    color:#777;
}

/* Input */
.form-label{
    font-weight:600;
    color:#555;
}

.form-control{
    border-radius:12px;
    padding:14px;
    border:1px solid #ddd;
    transition:.3s;
}

.form-control:focus{
    border-color:#d63384;
    box-shadow:0 0 0 .2rem rgba(214,51,132,.15);
}

/* Button */
.btn-login{
    width:100%;
    padding:14px;
    border:none;
    border-radius:12px;
    background:linear-gradient(135deg,#ff6fa5,#d63384);
    color:white;
    font-weight:600;
    transition:.3s;
}

.btn-login:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 25px rgba(214,51,132,.35);
}

/* Error */
.error-message{
    color:#dc3545;
    font-size:13px;
    margin-top:5px;
}

/* Footer */
.login-footer{
    text-align:center;
    margin-top:25px;
    color:#777;
}

.login-footer a{
    color:#d63384;
    text-decoration:none;
    font-weight:600;
}

.login-footer a:hover{
    text-decoration:underline;
}

/* Responsive */
@media(max-width:768px){

.login-card{
    flex-direction:column;
}

.left-side,
.right-side{
    width:100%;
}

.left-side{
    padding:40px;
    text-align:center;
}

.left-side h1{
    font-size:30px;
}

}
</style>

<div class="login-container">

<div class="login-card">

    <!-- Left -->
    <div class="left-side">

        <div class="flower">💐</div>

        <h1>Bouquet Store</h1>

    </div>

    <!-- Right -->
    <div class="right-side">

        <div class="login-title">
            <h2>Masuk ke Akun</h2>
            <p>Silakan login untuk melanjutkan</p>
        </div>

        <form action="{{ route('auth') }}" method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="Masukkan email">

                @error('email')
                <div class="error-message">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Masukkan password">

                @error('password')
                <div class="error-message">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <button class="btn-login">
                🌷 Login Sekarang
            </button>

        </form>

        <div class="login-footer">
            © {{ date('Y') }} Bouquet Store
        </div>

    </div>

</div>

</div>

@endsection