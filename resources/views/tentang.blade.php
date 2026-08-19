<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Saya</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f6f9;
            color: #333;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 35px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .profile {
            text-align: center;
            margin-bottom: 35px;
        }

        .profile img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #e78d9b;
            margin-bottom: 15px;
        }

        .profile h1 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .profile p {
            color: #777;
        }

        .section {
            margin-top: 30px;
        }

        .section h2 {
            color: #e78d9b;
            margin-bottom: 15px;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        .section p {
            line-height: 1.8;
        }

        .info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 20px;
        }

        .info-box {
            background: #f8f9fa;
            padding: 18px;
            border-radius: 10px;
            border-left: 4px solid #e78d9b;
        }

        .info-box strong {
            display: block;
            margin-bottom: 7px;
            color: #555;
        }

        .features {
            padding-left: 20px;
            line-height: 2;
        }

        /* TOMBOL KEMBALI */
        .back-button {
            text-align: center;
            margin-top: 35px;
        }

        .back-button a {
            display: inline-block;
            background: #e78d9b;
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: 600;
            transition: 0.3s;
        }

        .back-button a:hover {
            background: #d87585;
            transform: translateY(-2px);
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #888;
        }

        @media (max-width: 600px) {
            .info {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="container">
    <div class="card">

        <!-- PROFIL -->
        <div class="profile">
            <img src="{{ asset('images/katsu.jpg') }}" alt="Foto Saya">

            <h1>Agnia Sholihati</h1>
            <p>Web Developer | Pelajar</p>
        </div>

        <!-- TENTANG SAYA -->
        <div class="section">
            <h2>Tentang Saya</h2>

            <p>
                Halo, saya <strong>Agnia Sholihati</strong>. Saya merupakan seorang
                pelajar yang tertarik dengan dunia pemrograman dan pengembangan
                aplikasi berbasis web. Saya membuat aplikasi ini sebagai salah
                satu project untuk mengembangkan kemampuan saya dalam membuat
                sistem informasi menggunakan teknologi web.
            </p>
        </div>

        <!-- TENTANG APLIKASI -->
        <div class="section">
            <h2>Tentang Aplikasi</h2>

            <p>
                Aplikasi yang saya buat adalah aplikasi
                <strong>Point of Sale (POS)</strong> yang digunakan untuk
                membantu proses pengelolaan penjualan. Aplikasi ini dapat
                membantu pengguna dalam mengelola data produk, transaksi
                penjualan, dan informasi yang berhubungan dengan kegiatan
                penjualan.
            </p>
        </div>

        <!-- TEKNOLOGI -->
        <div class="section">
            <h2>Teknologi yang Digunakan</h2>

            <div class="info">

                <div class="info-box">
                    <strong>Framework</strong>
                    Laravel
                </div>

                <div class="info-box">
                    <strong>Bahasa Pemrograman</strong>
                    PHP
                </div>

                <div class="info-box">
                    <strong>Database</strong>
                    MySQL
                </div>

                <div class="info-box">
                    <strong>Frontend</strong>
                    HTML, CSS, JavaScript
                </div>

                <div class="info-box">
                    <strong>Server Lokal</strong>
                    Laragon
                </div>

                <div class="info-box">
                    <strong>Database Management</strong>
                    HeidiSQL
                </div>

            </div>
        </div>

        <!-- FITUR -->
        <div class="section">
            <h2>Fitur Aplikasi</h2>

            <ul class="features">
                <li>Login dan autentikasi pengguna</li>
                <li>Pengelolaan data produk</li>
                <li>Pengelolaan transaksi penjualan</li>
                <li>Menambah, mengubah, dan menghapus data</li>
                <li>Pencatatan data penjualan</li>
                <li>Dashboard untuk melihat informasi aplikasi</li>
            </ul>
        </div>

        <!-- TOMBOL KEMBALI -->
        <div class="back-button">
            <a href="{{ route('Beranda') }}">
                ← Kembali ke Beranda
            </a>
        </div>

        <!-- FOOTER -->
        <div class="footer">
            <p>© 2026 Agnia Sholihati - Aplikasi Point of Sale</p>
        </div>

    </div>
</div>

</body>
</html>
