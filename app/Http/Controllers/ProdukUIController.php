<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukUIController extends Controller
{
    public function index() {
        return view('home');
    }

    public function listProduk() {
    $produks = Produk::all();
    return view('produks', compact('produks'));
}


    public function editProduk($id) {
    $produk = Produk::findOrFail($id);
    return view('update_produk', compact('produk'));
}

    public function updateProduk(Request $request) {
    $request->validate([
        'id' => 'required|exists:produks,id',
        'nama' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'harga' => 'required|numeric|min:0',
        'stok' => 'required|integer|min:0',
    ]);

    $produk = Produk::findOrFail($request->id);
    $produk->update($request->only(['nama', 'deskripsi', 'harga', 'stok']));

    return redirect('/produks')->with('success', 'Produk berhasil diperbarui!');
}

public function destroyProduk($id)
{
    $produk = Produk::findOrFail($id);
    $produk->delete();

    return redirect('/produks')->with('success', 'Produk berhasil dihapus!');
}


    public function storeProduk(Request $request) {
        $request->validate([
    'nama' => 'required|string|max:255',
    'deskripsi' => 'nullable|string',
    'harga' => 'required|numeric|min:0',
    'stok' => 'required|integer|min:0',
]);



        Produk::create($request->all());
        return redirect('/produks')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function reduceStock(Request $request, $id)
{
    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    $produk = Produk::findOrFail($id);

    if ($produk->stok < $request->quantity) {
        return response()->json(['error' => 'Stok produk tidak cukup'], 400);
    }

    $produk->stok -= $request->quantity;
    $produk->save();

    return response()->json(['message' => 'Stok berhasil dikurangi', 'stok_tersisa' => $produk->stok]);
}

}
