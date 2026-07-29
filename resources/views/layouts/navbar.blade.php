<nav class="navbar navbar-expand-lg navbar-dark shadow-sm sticky-top florist-navbar">
    <div class="container">

        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('dashboard') }}">
            <i class="bi bi-flower1 me-2"></i>
            Bouquet POS
        </a>

        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}"
                       href="{{ route('dashboard') }}">
                        <i class="bi bi-grid-fill me-1"></i>
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}"
                       href="{{ route('admin.users') }}">
                        <i class="bi bi-people-fill me-1"></i>
                        Users
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('produk*') ? 'active' : '' }}"
                       href="{{ route('produk.index') }}">
                        <i class="bi bi-box-seam me-1"></i>
                        Produk
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('penjualan*') ? 'active' : '' }}"
                       href="{{ route('penjualan.index') }}">
                        <i class="bi bi-cart-check-fill me-1"></i>
                        Penjualan
                    </a>
                </li>

            </ul>

            <div class="d-flex align-items-center gap-3">

                <div class="user-info text-white">

                    <small class="d-block opacity-75">
                        Selamat Datang
                    </small>

                    <strong>
                        {{ Auth::user()->name ?? 'Admin' }}
                    </strong>

                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit" class="btn btn-light btn-sm px-3 rounded-pill">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </button>
                </form>

            </div>

        </div>
    </div>
</nav>

<style>

.florist-navbar{
    background: linear-gradient(
        135deg,
        #ff8fb1,
        #ffb3c7,
        #b388ff
    );
    padding: 12px 0;
}

.navbar-brand{
    font-size: 1.4rem;
    letter-spacing: .5px;
}

.nav-link{
    color: rgba(255,255,255,.9) !important;
    font-weight: 500;
    margin: 0 5px;
    padding: 10px 15px !important;
    border-radius: 12px;
    transition: .3s;
}

.nav-link:hover{
    background: rgba(255,255,255,.18);
    color: #fff !important;
}

.nav-link.active{
    background: rgba(255,255,255,.25);
    color: #fff !important;
}

.user-info{
    text-align: right;
}

.btn-light{
    font-weight: 600;
    border: none;
    transition: .3s;
}

.btn-light:hover{
    transform: translateY(-2px);
}

@media (max-width: 991px){

    .user-info{
        text-align: left;
        margin-top: 15px;
    }

}

</style>