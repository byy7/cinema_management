@extends('layouts.admin_app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Tambah Jadwal Tayang</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('jadwal_tayang.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Film :</label>
                                    <select name="id_film" class="form-select select2">
                                        @foreach ($films as $item1)
                                            <option value="{{ $item1->id }}">{{ $item1->judul }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Tipe :</label>
                                    <select name="tipe" class="form-select select2">
                                        @foreach (\App\Models\JadwalTayang::TYPE_SELECT as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Studio :</label>
                                    <select name="id_studio" class="form-select select2">
                                        @foreach ($studios as $item3)
                                            <option value="{{ $item3->id }}">{{ $item3->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="waktu_mulai">Waktu Mulai</label>
                                    <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="waktu_selesai">Waktu Selesai</label>
                                    <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_tayang">Tanggal Penayangan</label>
                                    <input type="date" name="tanggal_tayang" id="tanggal_tayang" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="harga">Harga :</label>
                                    <input type="number" name="harga" class="form-control" id="harga">
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
