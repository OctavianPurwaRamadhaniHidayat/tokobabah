@extends('admin.master.master_sepatu_admin')
@section('content')
<h2 style="text-align: center;">Daftar Sepatu</h2>

<div class="action-top">
    <form action="/tambah" method="get">
        <button type="submit" class="btn-action">
            Tambah Produk
        </button>
    </form>
</div>


<div class="produk-grid">
    <!-- untuk menampilkan produk di halaman -->
    @forelse ($produks as $produk)
    
        <div class="card">
            <div class="produk-img">
                <img src="{{ asset('asset/img/'.$produk->gambar) }}">
            </div>
            <h3>{{ $produk->nama }}</h3>
            <p>Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>

            <button class="btn-detail"
                onclick="openModal(
                    '{{ asset('asset/img/'.$produk->gambar) }}',
                    '{{ $produk->nama }}',
                    '{{ number_format($produk->harga,0,',','.') }}',
                    '{{ $produk->deskripsi }}'
                )">
                Detail Produk
            </button>
            <!-- <button>Edit Detail ?</button> -->
            <div class="mt-2 text-center">
                        <form action="/produk/{{ $produk->id }}/edit" method="get" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Edit</button>
                        </form>

                        <form action="/produk/{{ $produk->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus produk ini?')">Hapus</button>
                        </form>
            </div>
        </div>
    @empty
        <p>Belum ada produk.</p>
    @endforelse
</div>
<script>
function openModal(img, nama, harga, deskripsi) {
    document.getElementById('produkModal').style.display = 'flex';
    document.getElementById('modalImg').src = img;
    document.getElementById('modalNama').innerText = nama;
    document.getElementById('modalHarga').innerText = harga;
    document.getElementById('modalDeskripsi').innerText = deskripsi;
}

function closeModal() {
    document.getElementById('produkModal').style.display = 'none';
}
</script>

<!-- MODAL DETAIL PRODUK -->
<div id="produkModal" class="modal">
    <div class="modal-content">

        <span class="close" onclick="closeModal()">&times;</span>

        <img id="modalImg">

        <h3 id="modalNama"></h3>

        <p class="harga">Rp <span id="modalHarga"></span></p>

        <p id="modalDeskripsi"></p>

        <div class="contact-wa">
            <span>Negosiasi atau Membeli? bisa hubungi:</span>
            <strong>0812-8272-7741</strong>
        </div>

    </div>
</div>
@endsection