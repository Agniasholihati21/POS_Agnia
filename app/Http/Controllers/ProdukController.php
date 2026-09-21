<?php

namespace App\Http\Controllers;

use App\Http\Requests\Produk\StoreRequest;
use App\Http\Requests\Produk\UpdateRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchRequest $request)
    {
        $this->authorize('viewAny', Produk::class);

        $keyword = $request->input('search');

        // Menghitung total barang terjual menggunakan kolom 'kuantitas'
        $query = Produk::withSum('itemPenjualan as total_terjual', 'kuantitas');

        if ($keyword) {
            $products = $query->where('nama', 'like', '%' . $keyword . '%')
                ->orderBy('nama')
                ->paginate(10)
                ->withQueryString();
        } else {
            $products = $query->latest()->paginate(10)->withQueryString();
        }

        // Mengambil nilai kuantitas terjual terbanyak di antara semua produk
        $maxSold = Produk::withSum('itemPenjualan as total_terjual', 'kuantitas')
            ->get()
            ->max('total_terjual') ?? 0;

        return view('produk.index', compact('products', 'maxSold'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Produk::class);

        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $this->authorize('create', Produk::class);

        $dataReq = $request->validated();

        $data['user_id'] = Auth::id();
        $data['nama'] = $dataReq['name'];
        $data['harga_beli'] = $dataReq['purchase_price'];  
        $data['harga_jual'] = $dataReq['selling_price'];
        $data['stok'] = $dataReq['stock'] ?? true;

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('products', 'public');
        }
        
        Produk::create($data);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        $this->authorize('view', $produk);

        return view('produk.Detail', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        $this->authorize('update', $produk);

        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Produk $produk)
    {
        $this->authorize('update', $produk);

        $dataReq = $request->validated();

        $data = [
            'user_id'    => Auth::id(),
            'nama'       => $dataReq['name'],
            'harga_beli' => $dataReq['purchase_price'],
            'harga_jual' => $dataReq['selling_price'],
            'stok'       => $dataReq['stock'],
        ];
        
        if ($request->hasFile('foto')) {
            if (
                $produk->foto &&
                Storage::disk('public')->exists($produk->foto)
            ) {
                Storage::disk('public')->delete($produk->foto);
            }
            $data['foto'] = $request->file('foto')->store('products', 'public');
        }

        $produk->update($data);

        return redirect()->route('produk.edit', $produk->id)->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $this->authorize('delete', $produk);

        if ($produk->itemPenjualan()->exists()) {
            return redirect()
                ->route('produk.index')
                ->with('error', 'Produk tidak dapat dihapus karena sudah digunakan pada transaksi penjualan.');
        }

        if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}