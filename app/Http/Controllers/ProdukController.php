<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index() {
        return Produk::all();
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
        ]);

        $produk = Produk::create($validated);
        return response()->json($produk, 201);
    }

    public function show($id) {
        return Produk::findOrFail($id);
    }
}
