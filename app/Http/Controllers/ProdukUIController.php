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

    public function storeProduk(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
        ]);

        Produk::create($request->all());
        return redirect('/produks')->with('success', 'Produk berhasil ditambahkan!');
    }
}
