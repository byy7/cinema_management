@extends('layouts.user_app')

@section('content')
    <section id="portfolio-details" class="portfolio-details">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <img src="{{ asset('assets/images/' . $jadwalTayang->film->gambar) }}" alt="Gambar"
                        class="img-fluid img-thumbnail">
                </div>
                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Detail Film</h3>
                        <ul>
                            <li><strong>Judul</strong>: {{ $jadwalTayang->film->judul }}</li>
                            <li><strong>Durasi</strong>: {{ $jadwalTayang->film->durasi }} menit</li>
                            <li><strong>Teater</strong>: {{ $jadwalTayang->teater->nama }}</li>
                            <li><strong>Studio</strong>: {{ $jadwalTayang->studio->nama }}</li>
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
                            Pesan Tiket
                        </button>
                    </div>
                    <div class="portfolio-description">
                        <h2>Sinopsis</h2>
                        <p align="justify">
                            {{ $jadwalTayang->film->sinopsis }}
                        </p>
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pemesanan Tiket</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('store_ticket') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_jadwal_tayang" value="{{ $jadwalTayang->id }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Film :</label>
                                    <select class="form-select" disabled>
                                        <option selected>{{ $jadwalTayang->film->judul }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-3">
                                    <label class="form-label">Teater :</label>
                                    <select class="form-select" disabled>
                                        <option selected>{{ $jadwalTayang->teater->nama }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-3">
                                    <label class="form-label">Studio :</label>
                                    <select class="form-select" disabled>
                                        <option selected>{{ $jadwalTayang->studio->nama }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-3">
                                    <label class="form-label">Kursi :</label>
                                    @if ($kursis->count() != 0)
                                        <select name="id_kursi" class="form-select">
                                            @foreach ($kursis as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <p class="text-danger">Kursi Penuh Hari Ini</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
