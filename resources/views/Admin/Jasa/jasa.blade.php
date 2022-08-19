@extends('Admin.halaman')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jasa treatment</h1>
      <div class="mb-10">
        <a href="{{ route('jasa.create') }}" class="btn btn-success btn-icon-split">
            + Create Product
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
                        <th>Nama Jasa</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jasa as $d)   
                    <tr>
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $d->nama_jasa}}</td>
                        <td>{{ $d->deskripsi}}</td>
                        <td>@currency($d->harga )</td>
                        <td class="text-center">
                            <a href="{{ route('jasa.edit', ['jasa' => $d->id]) }}" class="btn btn-primary btn-edit"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection