@extends('layouts.user_app')

@section('content-header')
    <section id="hero" class="d-flex align-items-center">
        <div class="container d-flex flex-column align-items-center justify-content-center" data-aos="fade-up">
            <h1>Hai, Selamat Datang {{ Auth::user()->name }}</h1>
            <h2>Nikmati Nonton Ceria Bersama CGW Cinema</h2>
            <a href="#film" class="btn-get-started scrollto">Selengkapnya</a>
            <img src="{{ asset('assets/images/28946.jpg') }}" class="img-fluid hero-img img-thumbnail" alt="Image"
                data-aos="zoom-in" data-aos-delay="150" width="350px">
        </div>
    </section>
@endsection

@section('content')
    <!-- ======= Services Section ======= -->
    <section id="teater" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Teater</h2>
                <p>Berikut merupakan teater dari CGW Cinema</p>
            </div>

            <div class="row">
                @forelse ($teaters as $item)
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon">
                                <img src="{{ asset('assets/images/' . $item->gambar) }}" alt="Images" class="img-fluid">
                            </div>
                            <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="text-center">
                            <h3><strong>Data Belum Tersedia</strong></h3>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="film" class="testimonials section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Jadwal Film</h2>
            </div>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    @forelse ($listFilm as $item)
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{ asset('assets/images/' . $item->film->gambar) }}" alt="Gambar"
                                    class="img-fluid">
                                <h3>{{ $item->film->judul }}</h3>
                                <h4><b>Rp.{{ $item->harga }}</b></h4>
                                <hr>
                                <p style="margin: 0">Sinopsis:</p>
                                <p align="justify">{{ $item->film->sinopsis }}</p>
                                <h6><strong>{{ $item->teater->nama }} - {{ $item->studio->nama }}</strong></h6>
                                <hr>

                                <h6>Tanggal {{ \Carbon\Carbon::parse($item->tanggal_tayang)->format('d/m/Y') }}</h6>
                                <h6>Pukul {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}</h6>
                                <button type="button" class="btn btn-outline-primary mb-4 mt-3" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    Pesan Tiket
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="text-center">
                            <h3><strong>Data Belum Tersedia</strong></h3>
                        </div>
                    @endforelse
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <section id="tiket" class="team">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Data Pemesanan Tiket</h2>
            </div>

            <div class="row mt-4">
                <div class="col-xl-12 col-lg-12 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <button type="button" class="btn btn-outline-primary mb-4" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        Pesan Tiket
                    </button>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" style="width: 100%" id="datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Film</th>
                                    <th>Teater</th>
                                    <th>Studio</th>
                                    <th>Tanggal</th>
                                    <th>Harga</th>
                                    <th>Kursi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($pemesanans as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->jadwalTayang->film->judul }}</td>
                                        <td>{{ $item->jadwalTayang->teater->nama }}</td>
                                        <td>{{ $item->jadwalTayang->studio->nama }}</td>
                                        <td>{{ $item->jadwalTayang->tanggal_tayang }}</td>
                                        <td>Rp.{{ $item->jadwalTayang->harga }}</td>
                                        <td>{{ $item->kursi->nama }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control".>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js_after')
    <script>
        $(document).ready(function() {
            $("#datatable").dataTable();
        });
    </script>
@endsection
