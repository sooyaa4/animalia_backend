@extends('Admin.halaman')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Transaksi Penjualan jasa Treatment</h1>
</div>

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Transaksi Penjualan jasa Treatment</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col"><i class="far fa-flag"></i></th>
                            <th>Nama pelanggan</th>
                            <th>Tanggal transaksi</th>
                            <th>Tanggal Booking</th>
                            <th>Petugas</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $d)   
                        <tr>
                            <th scope="row">{{ $loop->iteration}}</th>
                            <td>{{ $d->user->pelanggan->nama}}</td>
                            <td>{{ $d->tanggal_pembelian}}</td>
                            <td>{{ $d->tanggal_booking }}</td>
                            <td>
                                @if ($d->karyawan_id == null)
                                    Belumn menugaskan
                                @else
                                {{ $d->karyawan->nama_karyawan }}
                                @endif
                                </td>
                            <td>{{ $d->status }}</td>
                            <td class="text-center">
                                <a href="{{ route('sewajasa.edit', ['sewajasa' => $d->id]) }}" class="btn btn-primary btn-edit">Pilih karyawan</a>
                                <a href="/Admin/sewajasa/{{ $d->id }}" class="btn btn-primary btn-edit"><i class="fas fa-edit"></i></a>
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
{{-- {{ route('', $d->id)}} --}}