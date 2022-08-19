<!doctype html>
<html lang="en">
    <head>
        @include('includes.meta')

        @include('includes.stylesAdmin')

        <style>
            #tabel-laporan{
                overflow: hidden;
            }

            @media print{
                #tabel-laporan{
                    width: 21cm;
                }
            }
        </style>

        <title>{{ $title ?? env('APP_NAME') }}</title>
    </head>
    <body class="bg-white">
        <div class="w-80">
            <div class="container mt-3">
                <header class="border-bottom pb-3 mb-3">
                    <div class="row row-cols-3 align-items-center">
                        <div class="col">
                            <img src="{{ asset('image/animalia.png') }}" width="80px" class="img-fluid" alt="logo_digitaliz">
                        </div>

                        <div class="col text-center">
                            <h1 class="fs-6 fw-bold">Daftar Seluruh Transaksi Penjualan Treatment Animalia</h1>
                        </div>
                    </div>
                </header>

                @if ($data->count())
                <div class="table-responsive" id="tabel-laporan">
                    <table class="table table-striped table-hover table-bordered" id="table-laporan">
                <tbody>
                    <tr class="text-center">
                        <th scope="col"><i class="far fa-flag"></i></th>
                        <th>Nama pelanggan</th>
                        <th>Tanggal transaksi</th>
                        <th>Total pembelian</th>
                        <th>status</th>
                    </tr>
                    @foreach ($data as $d)
                    <tr>
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $d->user->pelanggan->nama}}</td>
                        <td>{{ $d->created_at->format('d-m-Y')}}</td>
                        <td>{{ $d->total_harga}}</td>
                        <td>{{ $d->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
                @else
                    <p class="text-center">Transaksi Produk tidak di temukan</p>
                @endif
            </table>
        </div>

        @include('includes.scriptAdmin')

        <script>
            $(document).ready(function(){
                window.print();
            });
        </script>

    </body>
</html>