@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Produk</h2>
    <form action="{{ route('dataproduk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="foto" class="form-label">Foto Produk</label>
            <input type="file" name="foto" class="form-control">
            <img src="{{ Storage::url($produk->foto) }}" width="100" alt="Foto Produk">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" name="nama" class="form-control" value="{{ $produk->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="berat" class="form-label">Berat (Gram)</label>
            <input type="number" name="berat" class="form-control" value="{{ $produk->berat }}" required>
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" value="{{ $produk->stok }}" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $produk->harga }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $produk->alamat }}" required>
        </div>
        <div class="mb-3">
            <label for="deskrips" class="form-label">Deskripsi Produk</label>
            <input type="text" name="deskripsi" class="form-control" value="{{ $produk->deskripsi }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
