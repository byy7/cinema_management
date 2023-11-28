@extends('layouts.admin_app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Lihat Jadwal Tayang</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Film :</label>
                                <select name="id_film" class="form-select" disabled>
                                    <option>{{ $jadwalTayang->film->judul }}</option>
                                </select>
                                @error('id_film')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Teater :</label>
                                <select name="id_film" class="form-select" disabled>
                                    <option>{{ $jadwalTayang->teater->nama }}</option>
                                </select>
                                @error('id_teater')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Studio :</label>
                                <select name="id_film" class="form-select" disabled>
                                    <option>{{ $jadwalTayang->studio->nama }}</option>
                                </select>
                                @error('id_studio')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="waktu_mulai">Waktu Mulai</label>
                                <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-control"
                                    value="{{ $jadwalTayang->waktu_mulai }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="waktu_selesai">Waktu Selesai</label>
                                <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-control"
                                    value="{{ $jadwalTayang->waktu_selesai }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_tayang">Tanggal Penayangan</label>
                                <input type="date" name="tanggal_tayang" id="tanggal_tayang" class="form-control"
                                    value="{{ $jadwalTayang->tanggal_tayang }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="harga">Harga : </label>
                                <input type="number" name="harga" class="form-control" id="harga"
                                    value="{{ $jadwalTayang->harga }}" disabled>
                                @error('harga')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="text-end">
                                <a href="{{ route('jadwal_tayang.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
