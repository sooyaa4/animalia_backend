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
                            <h1 class="fs-6 fw-bold">Daftar Seluruh Pelanggan Animalia</h1>
                        </div>
                    </div>
                </header>

                @if ($data->count())
                <div class="table-responsive" id="tabel-laporan">
                    <table class="table table-striped table-hover table-bordered" id="table-laporan">
                <tbody>
                    <tr class="text-center">
                        <th scope="col"><i class="far fa-flag"></i></th>
                        <th>Nama Pelanggan</th>
                        <th>Username</th>
                        <th>Tanggal Daftar</th>
                    </tr>
                    @foreach ($data as $d)
                    <tr>
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->username}}</td>
                        <td>{{ $d->created_at->format('d-m-Y')}}</td>
                    </tr>
                    @endforeach
                </tbody>
                @else
                    <p class="text-center">Pelanggan tidak di temukan</p>
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