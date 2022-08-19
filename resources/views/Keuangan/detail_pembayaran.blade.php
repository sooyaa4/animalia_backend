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
                                <td class="border px-6 py-4">{{ $pembayaran->transaksi->user->pelanggan->nama }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Payment</th>
                                <td class="border px-6 py-4">{{ $bayar->metodbayar->nama_metode }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Total Price</th>
                                <td class="border px-6 py-4">{{ number_format($pembayaran->transaksi->total_harga) }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Status transaksi</th>
                                <td class="border px-6 py-4">{{ $pembayaran->transaksi->status }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Status Pembayaran</th>
                                <td class="border px-6 py-4">{{ $pembayaran->status }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Tanggal Transaksi</th>
                                <td class="border px-6 py-4">{{ $pembayaran->transaksi->tanggal_pembelian }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Tanggal Pembayaran</th>
                                <td class="border px-6 py-4">{{ $bayar->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>







@endsection