@extends('user.master.master_sepatu')
@section('content')
<h2 style="text-align: center;">Daftar Sepatu</h2>

<div class="produk-grid">
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
            <span>Negosiasi atau Mau Membeli? bisa hubungi:</span>
            <strong>0812-8272-7741</strong>
        </div>

    </div>
</div>

@endsection