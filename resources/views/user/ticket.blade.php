<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Tiket</title>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
        }
    </style>
</head>

<body>
    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ asset('assets/images/cgw-high-resolution-logo-transparent-2.png') }}"
                                    alt="images" class="img-fluid" width="100px">
                            </div>
                            <div class="text-center mt-3">
                                <h3>{{ $pemesanan->jadwalTayang->film->judul }}</h3>
                                <p style="margin: 0">
                                    {{ \Carbon\Carbon::parse($pemesanan->jadwalTayang->tanggal_tayang)->translatedFormat('d F Y') }}
                                    |
                                    {{ \Carbon\Carbon::parse($pemesanan->jadwalTayang->waktu_mulai)->translatedformat('H:i') }}
                                    -
                                    {{ \Carbon\Carbon::parse($pemesanan->jadwalTayang->waktu_selesai)->translatedformat('H:i') }}
                                </p>
                                <p>{{ $pemesanan->jadwalTayang->studio->nama }} |
                                    Rp.{{ $pemesanan->jadwalTayang->harga }}
                                    <strong>({{ $pemesanan->jadwalTayang->tipe }})</strong>
                                </p>
                                <h2>{{ $pemesanan->kursi->nama }}</h2>
                            </div>
                        </div>
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
