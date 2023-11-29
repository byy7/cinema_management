@extends('layouts.user_app')

@section('content-header')
    <section id="hero" class="d-flex align-items-center">
        <div class="container d-flex flex-column align-items-center justify-content-center" data-aos="fade-up">

            <h1>Hai, Selamat Datang {{ Auth::user()->name }}</h1>
            <h2>Nikmati Nonton Ceria Bersama CGW Cinema</h2>
            <img src="{{ asset('assets/images/28945.jpg') }}" class="img-fluid hero-img img-thumbnail" alt="Image"
                data-aos="zoom-in" data-aos-delay="150" width="350px">
            <a href="#film" class="btn-get-started scrollto">Selengkapnya</a>
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
                            <h4 class="title">{{ $item->nama }}</h4>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="text-center text-white">
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
                                <h6> {{ \Carbon\Carbon::parse($item->tanggal_tayang)->translatedFormat('d F Y') }}
                                </h6>
                                <h6>{{ \Carbon\Carbon::parse($item->waktu_mulai)->translatedformat('H:i') }} -
                                    {{ \Carbon\Carbon::parse($item->waktu_selesai)->translatedformat('H:i') }}</h6>
                                <a href="{{ route('detail_film', $item->id) }}"
                                    class="btn btn-outline-primary mt-3 mb-5">Detail</a>
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
                    <a href="#film" class="btn btn-outline-primary mb-4">Pesan Tiket</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" style="width: 100%" id="datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Film</th>
                                    <th class="text-center">Teater</th>
                                    <th class="text-center">Studio</th>
                                    <th class="text-center">Kursi</th>
                                    <th class="text-center">Waktu</th>
                                    <th class="text-center">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($pemesanans as $item)
                                    <tr class="text-center">
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->jadwalTayang->film->judul }}</td>
                                        <td>{{ $item->jadwalTayang->teater->nama }}</td>
                                        <td>{{ $item->jadwalTayang->studio->nama }}</td>
                                        <td>{{ $item->kursi->nama }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->jadwalTayang->tanggal_tayang)->translatedFormat('d F Y') }}
                                            |
                                            {{ \Carbon\Carbon::parse($item->jadwalTayang->waktu_mulai)->translatedformat('H:i') }}
                                            -
                                            {{ \Carbon\Carbon::parse($item->jadwalTayang->waktu_selesai)->translatedformat('H:i') }}
                                        </td>
                                        <td>Rp.{{ $item->jadwalTayang->harga }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('js_after')
    <script>
        $(document).ready(function() {
            $("#datatable").dataTable();
        });
    </script>
@endsection
