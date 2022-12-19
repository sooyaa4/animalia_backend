<!doctype html>
<html>
    {{-- {{ HTML::style('css/bootstrap.min.css') }} --}}
    <body class="bg-white">
        <div class="w-80">
            <div class="container mt-3">
                {{-- <header class="border-bottom pb-3 mb-3">
                    <div class="row row-cols-3 align-items-center">
                        <div class="col">
                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/image/animalia.png'))) }}" width="80px" class="img-fluid" alt="logo">
                        </div>

                        <div class="col text-center">
                            <h1 class="fs-6 fw-bold">Daftar Seluruh Pelanggan Animalia</h1>
                        </div>
                    </div>
                </header> --}}

                @if ($user->count())
                <div class="table-responsive" id="tabel-laporan">
                    <table class="table table-striped table-hover table-bordered" id="table-laporan">
                <tbody>
                    <tr class="text-center">
                        <th scope="col"><i class="far fa-flag"></i></th>
                        <th>Nama pelanggan</th>
                        <th>Email Pelanggan</th>
                        <th>Tanggal Daftar Akun</th>
                    </tr>
                    @foreach ($user as $d)
                    <tr>
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $d->pelanggan->nama}}</td>
                        <td>{{ $d->email}}</td>
                        <td>{{ $d->created_at->format('d-m-Y')}}</td>
                    </tr>
                    @endforeach
                </tbody>
                @else
                    <p class="text-center">Data Pelanggan tidak di temukan</p>
                @endif
            </table>
        </div>
    </body>
</html>