<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function sepatu()
    {
        $produks = Produk::all(); // ambil semua produk

        return view('user.sepatu', compact('produks'));
    }

    public function search(Request $request)
{
    $query = Produk::query();

    // 🔍 Search nama
    if ($request->filled('q')) {
        $query->where('nama', 'like', '%' . $request->q . '%');
    }

    $produks = $query->get();

    return view('user.sepatu', compact('produks'));
}

public function search_admin(Request $request)
{
    $query = Produk::query();

    // 🔍 Search nama
    if ($request->filled('q')) {
        $query->where('nama', 'like', '%' . $request->q . '%');
    }

    $produks = $query->get();

    return view('admin.sepatu_admin', compact('produks'));
}


    public function sepatu_admin()
    {
        $produks = Produk::all(); // ambil semua produk

        return view('admin.sepatu_admin', compact('produks'));
    }

    // FORM EDIT
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.crud.edit', compact('produk'));
    }
    

    // UPDATE DATA
public function update(Request $request, $id)
{
    $produk = Produk::findOrFail($id);

    $data = [
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
        'harga' => $request->harga,
        'is_hot' => $request->has('is_hot') // 🔥
    ];

    if ($request->hasFile('gambar')) {
        $namaGambar = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('asset/img'), $namaGambar);
        $data['gambar'] = $namaGambar;
    }

    $produk->update($data);

    return redirect('/sepatu_admin')
    ->with('success', 'Produk berhasil diupdate');

}


public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'deskripsi' => 'required',
        'harga' => 'required|numeric',
        'gambar' => 'required|image'
    ]);

    $namaGambar = time().'.'.$request->gambar->extension();
    $request->gambar->move(public_path('asset/img'), $namaGambar);

    Produk::create([
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
        'harga' => $request->harga,
        'gambar' => $namaGambar,
        'is_hot' => $request->has('is_hot') // 🔥 INI KUNCINYA
    ]);

    return redirect('/sepatu_admin')->with('success', 'Produk ditambahkan');
}


    // HAPUS DATA
    public function destroy($id)
        {
            Produk::findOrFail($id)->delete();
            return redirect()->back()->with('success', 'Produk berhasil dihapus');
        }

    }
