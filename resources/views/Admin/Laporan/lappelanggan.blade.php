@extends('Admin.halaman')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Data Pelanggan</h1>
    <a href="{{ route('print.all.report') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data pelanggan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col"><i class="far fa-flag"></i></th>
                        <th>Nama Pelanggan</th>
                        <th>Username</th>
                        <th>Tanggal Daftar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)   
                    <tr>
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->username}}</td>
                        <td>{{ $d->created_at->format('d-m-Y')}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
