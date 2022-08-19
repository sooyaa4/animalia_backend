@extends('Admin.halaman')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pelanggan</h1>
    <div class="mb-10">
        <a href="{{ route('pelanggan.create') }}" class="btn btn-success btn-icon-split">
            + Create Data
        </a>
    </div>
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
                        <th>Nomer Hp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)   
                    <tr>
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->username}}</td>
                        <td>{{ $d->no_telp}}</td>
                        <td class="text-center">
                            <a href="/Admin/pelanggan/{{ $d->id }}" class="btn btn-primary btn-add"><i class="fas fa-external-link-alt"></i></a>                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection