@extends('layouts.app')

@section('header')
<div class="container mt-3">
    <div class="d-md-flex bd-highlight align-items-center">
        <div class="me-auto p-2 mb-2 mb-md-0 bd-highlight">
            <h1>Daftar Pembayaran</h1>
            <h3 class="fw-normal">Pembayaran Pelanggan</h3>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col"><i class="far fa-flag"></i></th>
                                <th>Nama pelanggan</th>
                                <th>Tanggal transaksi</th>
                                <th>Tanggal bayar</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $d)   
                            <tr>
                                <th scope="row">{{ $loop->iteration}}</th>
                                <td>{{ $d->transaksi->user->pelanggan->nama }}</td>
                                <td>{{ $d->transaksi->tanggal_pembelian}}</td>
                                <td>{{ $d->created_at }}</td>
                                <td>{{ $d->status }}</td>
                                <td class="text-center">
                                    <a href="/karyawan_keuangan/pembayaran/{{ $d->id }}" class="btn btn-digitaliz"><i class="fas fa-external-link-alt"></i></a>
                                    <a href="{{ route('pembayaran.edit', ['pembayaran' => $d->id])}}" class="btn btn-primary btn-edit"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection