@extends('Admin.halaman')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Data Transaksi Produk</h1>
    <a href="{{ route('print.all.transapod') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<div class="container my-4">
    <div class="row">
        <div class="my-2">
            <form action="/Admin/laptransaksiprod" method="GET">
                <div class="input-group mb-3">
                    <input type="date" class="form-control" name="getdate">
                    <button class="btn btn-primary" type="submit">GET</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- 
<div class="container my-4">
    <div class="row">
        <div class="my-2">
            <form action="/Admin/laptransaksiprod" method="GET">
                <div class="input-group mb-3">
                    <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status" aria-label="Pilih status">
                            <option value="" selected>- Pilih -</option>
                            <option value="Pending" selected>- Pending -</option>
                            <option value="Pesanan di proses" selected>- Pesanan di proses -</option>
                            <option value="Selesai" selected>- Selesai -</option>
                            <option value="Di batalkan" selected>- Di batalkan -</option>
                        </select>
                    <button class="btn btn-primary" type="submit">GET</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data transaksi Produk</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col"><i class="far fa-flag"></i></th>
                        <th>Nama pelanggan</th>
                        <th>Tanggal transaksi</th>
                        <th>Total biaya pembelian</th>
                        <th>status</th>
                        <th>Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)   
                    <tr>
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $d->user->pelanggan->nama}}</td>
                        <td>{{ $d->created_at->format('d-m-Y')}}</td>
                        <td>{{ $d->subtotal}}</td>
                        <td>{{ $d->status }}</td>
                        <td class="text-center">
                            <a href="/Admin/print_pdf/{{ $d->id }}" class="btn btn-primary btn-edit"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
