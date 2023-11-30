<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Pemesanan</title>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

</head>

<body>
    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h4>LAPORAN PEMESANAN TIKET</h4>
                        <p>{{ \Carbon\Carbon::parse($tgl_awal)->translatedFormat('d F Y') }} s.d.
                            {{ \Carbon\Carbon::parse($tgl_akhir)->translatedFormat('d F Y') }}</p>
                    </div>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Nama Pemesan</th>
                                    <th>Film</th>
                                    <th>Studio</th>
                                    <th>Kursi</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pemesanans as $item)
                                    <tr class="text-center">
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->jadwalTayang->film->judul }}</td>
                                        <td>{{ $item->jadwalTayang->studio->nama }}</td>
                                        <td>{{ $item->kursi->nama }}</td>
                                        <td>Rp{{ $item->jadwalTayang->harga }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        $(() => {
            window.print();
            const afterPrint = setTimeout(() => {
                window.close()
            }, 1000);
        });
    </script>
</body>

</html>
