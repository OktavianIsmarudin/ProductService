@extends('layout')

@section('content')
    <h2>Data Produk</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        

    <ul class="list-group mb-3">
    @foreach ($produks as $produk)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <strong>{{ $produk->nama }}</strong> - {{ $produk->deskripsi }} (Rp{{ number_format($produk->harga, 0, ',', '.') }}) - Stok: {{ $produk->stok }}
            </div>
            <div class="d-flex gap-2">
                <a href="{{ url('/produks/edit/'.$produk->id) }}" class="btn btn-sm btn-primary">Edit</a>

                <form action="{{ route('produks.destroy', $produk->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </div>
        </li>
    @endforeach
</ul>

    <h3>Tambah Produk</h3>
    <form method="POST" action="/produks" class="row g-3">
        @csrf
        <div class="col-md-3">
            <input name="nama" class="form-control" placeholder="Nama Produk" value="{{ old('nama') }}">
        </div>
        <div class="col-md-3">
            <input name="deskripsi" class="form-control" placeholder="Deskripsi" value="{{ old('deskripsi') }}">
        </div>
        <div class="col-md-3">
            <input name="harga" type="number" class="form-control" placeholder="Harga" min="0" value="{{ old('harga') }}">
        </div>
        <div class="col-md-3">
            <input name="stok" type="number" class="form-control" placeholder="Stok" min="0" value="{{ old('stok') }}">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Tambah Produk</button>
        </div>
    </form>
@endsection
