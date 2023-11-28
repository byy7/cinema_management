@extends('layouts.admin_app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit Jadwal Tayang</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('jadwal_tayang.update', $jadwalTayang->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Film :</label>
                                    <select name="id_film" class="form-select select2">
                                        @foreach ($films as $item1)
                                            <option value="{{ $item1->id }}"
                                                {{ $jadwalTayang->id_film == $item1->id ? 'selected' : '' }}>
                                                {{ $item1->judul }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_film')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Teater :</label>
                                    <select name="id_teater" class="form-select select2">
                                        @foreach ($teaters as $item2)
                                            <option value="{{ $item2->id }}"
                                                {{ $jadwalTayang->id_teater == $item2->id ? 'selected' : '' }}>
                                                {{ $item2->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_teater')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Studio :</label>
                                    <select name="id_studio" class="form-select select2">
                                        @foreach ($studios as $item3)
                                            <option value="{{ $item3->id }}"
                                                {{ $jadwalTayang->id_studio == $item3->id ? 'selected' : '' }}>
                                                {{ $item3->nama }}</option>
                                        @endforeach
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
                                        value="{{ $jadwalTayang->waktu_mulai }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="waktu_selesai">Waktu Selesai</label>
                                    <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-control"
                                        value="{{ $jadwalTayang->waktu_selesai }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_tayang">Tanggal Penayangan</label>
                                    <input type="date" name="tanggal_tayang" id="tanggal_tayang" class="form-control"
                                        value="{{ $jadwalTayang->tanggal_tayang }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="harga">Harga : </label>
                                    <input type="number" name="harga" class="form-control" id="harga"
                                        value="{{ $jadwalTayang->harga }}">
                                    @error('harga')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-end">
                                    <a href="{{ route('jadwal_tayang.index') }}" class="btn btn-danger">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_after')
    <script>
        $(document).ready(function() {
            $(".select2").select2({
                width: '100%',
                theme: 'bootstrap-5'
            });
        });
    </script>
@endsection
