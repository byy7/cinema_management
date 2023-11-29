@extends('layouts.admin_app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit Film</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('film.update', $film->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="kode">Kode :</label>
                                    <input type="text" name="kode" class="form-control" id="kode"
                                        value="{{ $film->kode }}">
                                    @error('kode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="judul">Judul :</label>
                                    <input type="text" name="judul" class="form-control"
                                        id="judul"value="{{ $film->judul }}">
                                    @error('judul')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="sinopsis">Sinopsis :</label>
                                    <textarea name="sinopsis" id="sinopsis" class="form-control" rows="3">{{ $film->sinopsis }}</textarea>
                                    @error('sinopsis')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="durasi">Durasi :</label>
                                    <div class="input-group mb-3">
                                        <input type="number" name="durasi" class="form-control" id="durasi"
                                            value="{{ $film->durasi }}">
                                        <span class="input-group-text" id="durasi">menit</span>
                                    </div>
                                    @error('durasi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="embed_yt">Trailer Film (Link Embed Youtube) :</label>
                                    <textarea name="embed_yt" id="embed_yt" class="form-control" rows="3">{{ $film->embed_yt }}</textarea>
                                    @error('embed_yt')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="gambar">Gambar (Maks 1 MB | Jpg,Jpeg,Png) : </label>
                                    <input type="file" name="gambar" class="form-control" id="gambar">
                                    @error('gambar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @if (!empty($film->gambar))
                                        <br>
                                        <p>Gambar Sebelumnya :</p>
                                        <img src="{{ asset('assets/images/' . $film->gambar) }}"
                                            class="img-fluid img-thumbnail" width="150" alt="Image">
                                    @endif
                                </div>
                                <a href="{{ route('film.index') }}" class="btn btn-danger">Kembali</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
