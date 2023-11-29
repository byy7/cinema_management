@extends('layouts.user_app')

@section('content')
    <section id="portfolio-details" class="portfolio-details">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="portfolio-info">
                        <h3>Detail Film</h3>
                        <ul>
                            <li><strong>Judul</strong>: {{ $jadwalTayang->film->judul }}</li>
                            <li><strong>Durasi</strong>: {{ $jadwalTayang->film->durasi }} menit</li>
                            <li><strong>Studio</strong>: {{ $jadwalTayang->studio->nama }}</li>
                            <li><strong>Status Tiket</strong>: {{ $jadwalTayang->tipe }}</li>
                            <li><strong>Harga Tiket</strong>: Rp.{{ $jadwalTayang->harga }}</li>
                        </ul>
                        <p style="margin: 0"><strong>Jadwal Tayang :</strong></p>
                        <p>
                            {{ \Carbon\Carbon::parse($jadwalTayang->tanggal_tayang)->translatedFormat('d F Y') }} |
                            {{ \Carbon\Carbon::parse($jadwalTayang->waktu_mulai)->translatedFormat('H:i') }} -
                            {{ \Carbon\Carbon::parse($jadwalTayang->waktu_selesai)->translatedFormat('H:i') }}
                        </p>
                        <a href="{{ route('user') }}" class="btn btn-outline-info">Kembali</a>
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Bayar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Pembayaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('update_payment', $pemesanan->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id_jadwal_tayang" value="{{ $jadwalTayang->id }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mt-3">
                                    <label class="form-label">Bukti Bayar (jpg,jpeg,png) :</label>
                                    <input type="file" class="form-control" name="file" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
