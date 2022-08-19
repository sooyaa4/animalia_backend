@extends('Admin.halaman')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Jabatan</h1>
    <form action="{{ route('jabatan.store') }}" method="POST" class="d-flex bd-highlight">
        @csrf
        <div class="pe-2 bd-highlight w-100">
          <input class="form-control input-search" type="text" name="nama_jabatan" placeholder="Tambah Jabatan" aria-label="Tambah Kategori" required>
        </div>
        <div class="ps-2 bd-highlight">
          <button class="btn btn-success btn-icon-split" type="submit"><i class="far fa-plus-square me-2"></i>Add Data</button>
        </div>
      </form>
</div>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Jabatan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col"><i class="far fa-flag"></i></th>
                        <th>Nama jabatan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jabatan as $d)   
                    <tr>
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $d->nama_jabatan}}</td>
                        <td><button type="button" onclick="hapusData('{{ route('jabatan.destroy', ['jabatan' => $d->id]) }}')" class="btn btn-danger" data-bs-toggle="" data-bs-target=""><i class="fas fa-trash-alt"></i></button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection