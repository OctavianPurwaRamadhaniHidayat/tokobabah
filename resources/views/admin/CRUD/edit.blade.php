@extends('admin.crud.master_crud.master_edit_tambah')
@section('content')
<div class="form-wrapper">
    <div class="form-card">
        <h3 class="form-title">Edit Produk</h3>
        <form action="/produk/{{ $produk->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Gambar</label>
            <input type="file" name="gambar"
                class="form-control"
                value="{{ $produk->gambar }}">
        </div>

        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="nama"
                class="form-control"
                value="{{ $produk->nama }}">
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi"
                class="form-control"
                value="{{ $produk->deskripsi }}">
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga"
                class="form-control"
                value="{{ $produk->harga }}">
        </div>

        <div class="mb-3">
            <label>
                <input type="checkbox" name="is_hot" value="1"
                    {{ $produk->is_hot ? 'checked' : '' }}>
                Jadikan Hot Produk
            </label>
        </div>


        <div class="form-action">
                <button type="submit" class="btn-action">Update</button>
                <a href="/sepatu_admin" class="btn-secondary">Kembali</a>
            </div>
    </form>
    </div>
</div>
@endsection