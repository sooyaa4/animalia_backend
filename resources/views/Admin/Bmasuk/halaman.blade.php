@extends('Admin.halaman')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pencatat barang masuk</h1>
      <div class="mb-10">
        <a href="{{ route('masuk.create') }}" class="btn btn-success btn-icon-split">
            + Create data
        </a>
    </div>
</div>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data jasa</h6>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)   
                    <tr>
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $d->produk->nama_barang}}</td>
                        <td>{{ $d->produk->katbarang->nama_kategori}}</td>
                        <td>{{ $d->stok_masuk }}</td>
                        <td>{{ $d->tanggal_masuk }}</td>
                        <td class="text-center">
                            <a href="" class="btn btn-primary btn-edit"><i class="fas fa-edit"></i></a>
                            <button type="button" onclick="" class="btn btn-danger" data-bs-toggle="" data-bs-target=""><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection