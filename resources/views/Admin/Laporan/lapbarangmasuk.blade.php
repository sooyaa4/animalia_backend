@extends('Admin.halaman')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Data Barang Masuk</h1>
    <a href="{{ route('print.all.barangmasuk') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<div class="container my-4">
    <div class="row">
        <div class="my-2">
            <form action="/Admin/lapbarmasuk" method="GET">
                <div class="input-group mb-3">
                    <input type="date" class="form-control" name="getdate">
                    <button class="btn btn-primary" type="submit">GET</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Barang Masuk</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col"><i class="far fa-flag"></i></th>
                        <th>Nama Produk</th>
                        <th>Jenis Kategori Produk</th>
                        <th>Jumlah</th>
                        <th>Tanggal masuk</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)   
                    <tr>
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $d->produk->nama_barang}}</td>
                        <td>{{ $d->produk->katbarang->nama_kategori}}</td>
                        <td>{{ $d->stok_masuk }}</td>
                        <td>{{ $d->tanggal_masuk}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
