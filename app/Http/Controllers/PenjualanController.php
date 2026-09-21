<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchRequest $request)
    {
        $user = Auth::user();
        $keyword = $request->input('search');

        $sales = Penjualan::query()

            // Filter berdasarkan role
            ->when($user->role->name === 'kasir', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })

            // Search nama user
            ->when($keyword, function ($query) use ($keyword) {
                $query->whereHas('user', function ($q) use ($keyword) {
                    $q->where('name', 'like', '%' . $keyword . '%');
                });
            })

            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('penjualan.index', compact('sales'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(SearchRequest $request)
    {
        $sale = Penjualan::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'status' => 'OPEN'
            ],
            [
                'total_pembayaran' => 0,
                'metode_pembayaran' => 'CASH',

                // Tambahan
                'uang_dibayar' => 0,
                'kembalian' => 0,
            ]
        );

        $keyword = $request->input('search');

        if ($keyword) {

            $products = Produk::where(
                'nama',
                'like',
                '%' . $keyword . '%'
            )
            ->orderBy('nama')
            ->get();

        } else {

            $products = Produk::orderBy('nama')->get();

        }

        $mode = 'create';

        return view(
            'penjualan.pos',
            compact('sale', 'products', 'mode')
        );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        $sale = $penjualan->load('itemPenjualan.produk');

        $products = Produk::orderBy('nama')->get();

        $mode = 'view';

        return view(
            'penjualan.detail',
            compact('sale', 'products', 'mode')
        );
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        $sale = $penjualan;

        abort_if(
            $sale->status === 'COMPLETED',
            403
        );

        $sale->load('itemPenjualan');

        $products = Produk::orderBy('nama')->get();

        $mode = 'edit';

        return view(
            'penjualan.pos',
            compact('sale', 'products', 'mode')
        );
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'payment_method' => 'required|in:CASH,QRIS',

            // Untuk CASH wajib diisi.
            // Untuk QRIS boleh kosong.
            'uang_dibayar' => 'required_if:payment_method,CASH|nullable|numeric|min:0',
        ], [
            'payment_method.required' => 'Metode pembayaran wajib dipilih.',

            'payment_method.in' => 'Metode pembayaran tidak valid.',

            'uang_dibayar.required_if' =>
                'Uang pembayaran wajib diisi untuk pembayaran CASH.',

            'uang_dibayar.numeric' =>
                'Uang pembayaran harus berupa angka.',

            'uang_dibayar.min' =>
                'Uang pembayaran tidak boleh kurang dari 0.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | CEK STATUS TRANSAKSI
        |--------------------------------------------------------------------------
        */

        if ($penjualan->status !== 'OPEN') {

            return back()->with(
                'error',
                'Transaksi sudah diproses.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | CEK KERANJANG
        |--------------------------------------------------------------------------
        */

        if ($penjualan->itemPenjualan()->count() === 0) {

            return back()->with(
                'error',
                'Keranjang masih kosong.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | PROSES TRANSAKSI
        |--------------------------------------------------------------------------
        */

        DB::transaction(function () use ($penjualan, $request) {

            /*
            |--------------------------------------------------------------------------
            | HITUNG ULANG TOTAL & DISKON
            |--------------------------------------------------------------------------
            |
            | Hitung subtotal dari item di keranjang.
            | Jika subtotal >= 1.000.000, berikan diskon 10%.
            | Total pembayaran yang disimpan merupakan harga setelah diskon.
            |
            */

            $subtotal = $penjualan
                ->itemPenjualan()
                ->sum('subtotal');

            // Hitung Diskon (misal 10% untuk belanja >= 1 Juta)
            $diskon = 0;
            if ($subtotal >= 1000000) {
                $diskon = ($subtotal * 10) / 100; // Diskon 10%
                
                // Jika ingin potongan harga tetap (misal potong 50rb), gunakan:
                // $diskon = 50000;
            }

            // Total bayar bersih yang harus dibayar kasir
            $total = $subtotal - $diskon;


            /*
            |--------------------------------------------------------------------------
            | TENTUKAN UANG DIBAYAR
            |--------------------------------------------------------------------------
            */

            if ($request->payment_method === 'CASH') {

                $uangDibayar = (float) $request->uang_dibayar;

            } else {

                // QRIS dianggap dibayar pas sesuai total harga setelah diskon
                $uangDibayar = (float) $total;

            }


            /*
            |--------------------------------------------------------------------------
            | CEK UANG CASH
            |--------------------------------------------------------------------------
            */

            if (
                $request->payment_method === 'CASH'
                && $uangDibayar < $total
            ) {

                $kurang = $total - $uangDibayar;

                abort(
                    422,
                    'Uang pembayaran kurang Rp ' .
                    number_format(
                        $kurang,
                        0,
                        ',',
                        '.'
                    )
                );
            }


            /*
            |--------------------------------------------------------------------------
            | HITUNG KEMBALIAN
            |--------------------------------------------------------------------------
            */

            $kembalian = max(
                0,
                $uangDibayar - $total
            );


            /*
            |--------------------------------------------------------------------------
            | SIMPAN TRANSAKSI
            |--------------------------------------------------------------------------
            */

            $penjualan->update([
                'metode_pembayaran' => $request->payment_method,

                'total_pembayaran' => $total, // Menyimpan total harga bersih setelah diskon

                'uang_dibayar' => $uangDibayar,

                'kembalian' => $kembalian,

                'status' => 'COMPLETED',
            ]);
        });


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('penjualan.index')
            ->with(
                'success',
                'Transaksi berhasil diselesaikan.'
            );
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        $this->authorize(
            'delete',
            $penjualan
        );


        /*
        |--------------------------------------------------------------------------
        | PASTIKAN TRANSAKSI MASIH OPEN
        |--------------------------------------------------------------------------
        */

        if ($penjualan->status !== 'OPEN') {

            return redirect()
                ->route('penjualan.index')
                ->with(
                    'error',
                    'Transaksi sudah selesai dan tidak bisa dibatalkan.'
                );
        }


        DB::transaction(function () use ($penjualan) {

            /*
            |--------------------------------------------------------------------------
            | KEMBALIKAN STOK
            |--------------------------------------------------------------------------
            */

            foreach ($penjualan->itemPenjualan as $item) {

                $item->produk->increment(
                    'stok',
                    $item->kuantitas
                );
            }


            /*
            |--------------------------------------------------------------------------
            | HAPUS ITEM
            |--------------------------------------------------------------------------
            */

            $penjualan
                ->itemPenjualan()
                ->delete();


            /*
            |--------------------------------------------------------------------------
            | HAPUS PENJUALAN
            |--------------------------------------------------------------------------
            */

            $penjualan->delete();
        });


        return redirect()
            ->route('penjualan.index')
            ->with(
                'success',
                'Transaksi berhasil dibatalkan.'
            );
    }
}