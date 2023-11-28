@extends('layouts.admin_app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit Teater</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('teater.update', $teater->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="nama">Nama :</label>
                                    <input type="text" name="nama" class="form-control" id="nama"
                                        value="{{ $teater->nama }}">
                                    @error('nama')
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
                                    @if (!empty($teater->gambar))
                                        <br>
                                        <p>Gambar Sebelumnya :</p>
                                        <img src="{{ asset('assets/images/' . $teater->gambar) }}"
                                            class="img-fluid img-thumbnail" width="150" alt="Image">
                                    @endif
                                </div>
                                <a href="{{ route('teater.index') }}" class="btn btn-danger">Kembali</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
