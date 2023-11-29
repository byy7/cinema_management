@extends('layouts.admin_app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Pemesanan</h4>
                    </div>
                </div>
                <div class="card-body">
                    <a target="_blank" href="{{ route('pemesanan.print') }}" class="btn btn-outline-primary mb-4">
                        Cetak Laporan</a>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Aksi</th>
                                    <th>Bukti Bayar</th>
                                    <th>Film</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($pemesanans as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>
                                            @if ($item->status == \App\Models\Pemesanan::STATUS_ON_PROGRESS)
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop">
                                                        Terima Pembayaran
                                                    </button>

                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdropReject">
                                                        Tolak Pembayaran
                                                    </button>
                                                </div>
                                                <!-- Modal ACC -->
                                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                                    data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                                                    Konfirmasi
                                                                    Status</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('pemesanan.confirmation', $item->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('put')
                                                                <input type="hidden" name="status" value="Sudah Bayar">
                                                                <div class="modal-body">
                                                                    Data Tidak Dapat Diubah Lagi
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Tutup</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal TOLAK -->
                                                <div class="modal fade" id="staticBackdropReject" data-bs-backdrop="static"
                                                    data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                                                    Konfirmasi
                                                                    Status</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('pemesanan.confirmation', $item->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('put')
                                                                <input type="hidden" name="status"
                                                                    value="Pembayaran Ditolak">
                                                                <div class="modal-body">
                                                                    Data Tidak Dapat Diubah Lagi
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Tutup</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td><a target="_blank" class="btn btn-primary" href="{{ asset('assets/images/' . $item->file) }}">Lihat File</a>
                                            </td>
                                        <td>{{ $item->jadwalTayang->film->judul }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>Rp{{ $item->jadwalTayang->harga }}</td>
                                        <td>{{ $item->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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
