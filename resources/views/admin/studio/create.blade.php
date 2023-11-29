@extends('layouts.admin_app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Tambah Studio</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('studio.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="nama">Nama : </label>
                                    <input type="text" name="nama" class="form-control" id="nama">
                                    @error('nama')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="denah_kursi">Denah Kursi (Maks 1 MB | Jpg,Jpeg,Png) :
                                    </label>
                                    <input type="file" name="denah_kursi" class="form-control" id="denah_kursi">
                                    @error('denah_kursi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <a href="{{ route('studio.index') }}" class="btn btn-danger">Kembali</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
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
            $("#select2").select2({
                width: '100%',
                theme: 'bootstrap-5'
            });
        });
    </script>
@endsection
