@extends('admin.crud.master_crud.master_edit_tambah')

@section('content')
<div class="form-wrapper">
    <div class="form-card">
        <h3 class="form-title">Tambah Produk</h3>

        <form action="/store" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar">
            </div>

            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama" value="{{ old('nama') }}">
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <input type="text" name="deskripsi" value="{{ old('deskripsi') }}">
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" value="{{ old('harga') }}">
            </div>

            <div class="mb-3">
                <label>
                    <input type="checkbox" name="is_hot" value="1">
                    Jadikan Hot Produk
                </label>
            </div>


            <div class="form-action">
                <button type="submit" class="btn-action">Simpan</button>
                <a href="{{ url()->previous() }}" class="btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
