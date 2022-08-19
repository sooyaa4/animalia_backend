@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">Transaction Details</h2>
    
            <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-10">
                 <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th class="border px-6 py-4 text-right">Nama</th>
                                <td class="border px-6 py-4">{{ $transaksi->user->pelanggan->nama }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Email</th>
                                <td class="border px-6 py-4">{{ $transaksi->user->email }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Address</th>
                                <td class="border px-6 py-4">{{ $transaksi->alamat }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Payment</th>
                                <td class="border px-6 py-4">{{ $bayar->metodbayar->nama_metode }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Total Price</th>
                                <td class="border px-6 py-4">{{ $transaksi->total_harga }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Pilihan layanan</th>
                                <td class="border px-6 py-4">{{ $detil[0]->layanan->nama_layanan }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Biaya layanan</th>
                                <td class="border px-6 py-4">{{ $detil[0]->layanan->biaya }}</td>
                                <td class="border px-6 py-4">a</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Status</th>
                                <td class="border px-6 py-4">{{ $transaksi->status }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Tanggal Booking</th>
                                <td class="border px-6 py-4">{{ $transaksi->tanggal_booking }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    
            <br>
            <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">Transaction Items</h2>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col"><i class="far fa-flag"></i></th>
                                <th>Nama Jasa</th>
                                <th>Harga</th>
                                <th>Jumlah beli</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detil as $d)   
                            <tr>
                                <th scope="row">{{ $loop->iteration}}</th>
                                <td>{{ $d->jasa->nama_jasa }}</td>
                                <td>{{ $d->jasa->harga }}</td>
                                <td>{{ $d->jumlah_pesan_jasa }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection