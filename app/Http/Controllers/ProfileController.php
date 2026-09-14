<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $appInfo = (object) [
            'name'        => 'Bouquet POS',
            'description' => 'Aplikasi yang saya buat adalah aplikasi Point of Sale (POS) yang digunakan untuk membantu proses pengelolaan penjualan. Aplikasi ini dapat membantu pengguna dalam mengelola data produk, transaksi penjualan, dan informasi yang berhubungan dengan kegiatan penjualan.',
            'technologies' => [
                'Framework'           => 'Laravel',
                'Bahasa Pemrograman' => 'PHP',
                'Database'            => 'MySQL',
                'Frontend'            => 'HTML, CSS, JavaScript',
                'Server Lokal'        => 'Laragon',
                'Database Management' => 'HeidiSQL',
            ],
            'features' => [
                'Login dan autentikasi pengguna',
                'Pengelolaan data produk',
                'Pengelolaan transaksi penjualan',
                'Menambah, mengubah, dan menghapus data',
                'Dashboard untuk melihat informasi aplikasi',
            ],
            'author' => 'Agnia Sholihati',
        ];

        return view('profile.index', compact('appInfo'));
    }
}