@extends('layout')

@section('content')
    <h2>Update Produk</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('produks.update') }}" class="row g-3">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="{{ $produk->id }}">

        <div class="col-md-4">
            <label for="nama" class="form-label">Nama Produk</label>
            <input id="nama" name="nama" class="form-control" value="{{ old('nama', $produk->nama) }}" required>
        </div>

        <div class="col-md-4">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input id="deskripsi" name="deskripsi" class="form-control" value="{{ old('deskripsi', $produk->deskripsi) }}">
        </div>

        <div class="col-md-2">
            <label for="harga" class="form-label">Harga</label>
            <input id="harga" name="harga" type="number" class="form-control" value="{{ old('harga', $produk->harga) }}" required>
        </div>

        <div class="col-md-2">
            <label for="stok" class="form-label">Stok</label>
            <input id="stok" name="stok" type="number" class="form-control" value="{{ old('stok', $produk->stok) ?? 0 }}" min="0" required>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-success">Update Produk</button>
            <a href="{{ url('/produks') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
@endsection
