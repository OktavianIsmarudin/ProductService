@extends('layout')

@section('content')
    <h2>Data Produk</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <ul class="list-group mb-3">
        @foreach ($produks as $produk)
            <li class="list-group-item">
                <strong>{{ $produk->nama }}</strong> - {{ $produk->deskripsi }} (Rp{{ number_format($produk->harga, 0, ',', '.') }})
            </li>
        @endforeach
    </ul>

    <h3>Tambah Produk</h3>
    <form method="POST" action="/produks" class="row g-3">
        @csrf
        <div class="col-md-4">
            <input name="nama" class="form-control" placeholder="Nama Produk">
        </div>
        <div class="col-md-4">
            <input name="deskripsi" class="form-control" placeholder="Deskripsi">
        </div>
        <div class="col-md-4">
            <input name="harga" type="number" class="form-control" placeholder="Harga">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Tambah Produk</button>
        </div>
    </form>
@endsection
