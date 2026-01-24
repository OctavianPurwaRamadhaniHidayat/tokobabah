<?php


namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class HotProdukController extends Controller
{
    // ================= USER =================
    public function tampilUser()
    {
        $hotProduks = Produk::where('is_hot', 1)->get();

        return view('user.dashboard_user', compact('hotProduks'));
    }

    public function dashboard_admin()
        {
            $hotProduks = Produk::where('is_hot', 1)->get();
            return view('admin.dashboard_admin', compact('hotProduks'));
        }

    // ================= ADMIN =================
    public function index()
    {
        $hotProduks = HotProduk::all();
        return view('admin.hot_produk.index', compact('hotProduks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image'
        ]);

        $gambar = $request->file('gambar')->store('hotproduk', 'public');

        HotProduk::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
            'is_active' => true
        ]);

        return back();
    }
}
