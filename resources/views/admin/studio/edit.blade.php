@extends('layouts.admin_app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Detail Studio</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('studio.update', $studio->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
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
                                    @if (!empty($studio->denah_kursi))
                                        <br>
                                        <p>Gambar Sebelumnya :</p>
                                        <img src="{{ asset('assets/images/' . $studio->denah_kursi) }}"
                                            class="img-fluid img-thumbnail" width="150" alt="Image">
                                    @endif
                                </div>
                                <a href="{{ route('studio.index') }}" class="btn btn-danger">Kembali</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Detail Kursi</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Tambah Data
                            </button>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="datatable">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th>Aksi</th>
                                            <th style="width: 700px">Nama</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kursis as $item)
                                            @php
                                                $i = 0;
                                            @endphp
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>
                                                    <a href="{{ route('destroy_kursi', $item->id) }}"
                                                        class="btn btn-danger btn-sm" data-confirm-delete="true">Hapus</a>
                                                </td>
                                                <td>{{ $item->nama }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kursi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('store_kursi') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_studio" value="{{ $studio->id }}">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" autofocus>
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
            $("#select2").select2({
                width: '100%',
                theme: 'bootstrap-5'
            });

            $("#datatable").dataTable();
        });
    </script>
@endsection
