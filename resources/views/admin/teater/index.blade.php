@extends('layouts.admin_app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Teater</h4>
                    </div>
                    <a href="{{ route('teater.create') }}" class="btn btn-outline-primary btn-sm text-end"><svg class="icon-32"
                            width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.33 2H16.66C20.06 2 22 3.92 22 7.33V16.67C22 20.06 20.07 22 16.67 22H7.33C3.92 22 2 20.06 2 16.67V7.33C2 3.92 3.92 2 7.33 2ZM12.82 12.83H15.66C16.12 12.82 16.49 12.45 16.49 11.99C16.49 11.53 16.12 11.16 15.66 11.16H12.82V8.34C12.82 7.88 12.45 7.51 11.99 7.51C11.53 7.51 11.16 7.88 11.16 8.34V11.16H8.33C8.11 11.16 7.9 11.25 7.74 11.4C7.59 11.56 7.5 11.769 7.5 11.99C7.5 12.45 7.87 12.82 8.33 12.83H11.16V15.66C11.16 16.12 11.53 16.49 11.99 16.49C12.45 16.49 12.82 16.12 12.82 15.66V12.83Z"
                                fill="currentColor"></path>
                        </svg> Tambah Data</a>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-left alert-success alert-dismissible fade show mb-3" role="alert">
                            <span>{{ session('success') }}</span>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Aksi</th>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teaters as $item)
                                    @php
                                        $i = 0;
                                    @endphp
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>
                                            <a href="{{ route('teater.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <a href="{{ route('teater.destroy', $item->id) }}" class="btn btn-danger btn-sm"
                                                data-confirm-delete="true">Hapus</a>
                                        </td>
                                        <td>
                                            @if (!empty($item->gambar))
                                                <img src="{{ asset('assets/images/' . $item->gambar) }}"
                                                    class="img-fluid img-thumbnail" width="350" alt="image">
                                            @endif
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
@endsection

@section('js_after')
    <script>
        $(document).ready(function() {
            $("#datatable").dataTable();
        });
    </script>
@endsection
