@extends('Admin.halaman')

@section('content')


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Gambar barang  > {{ $produkbar->nama_barang }}</h1>
      <div class="mb-10">
        <a href="{{ route('produkbar.gambar.create', $produkbar->id) }}" class="btn btn-success btn-icon-split">
            + tambah gambar
        </a>
    </div>
</div>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Gambar barang</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col"><i class="far fa-flag"></i></th>
                        <th>Foto</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gambar as $d)   
                    <tr>
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td><img style="max-width: 150px;" src="'{{ $d->url }}'"/></td> 
                        <td class="text-center">
                            {{-- <button type="button"  class="btn btn-danger" onclick="hapusData('{{ route('produkbar.gambar.destroy',  $d->id) }}')" data-bs-toggle="" data-bs-target=""><i class="fas fa-trash-alt"></i></button> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection


