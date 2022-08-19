@extends('Admin.halaman')

@section('content')


<form class="user" action="{{ route('jasa.store') }}" method="post" enctype="multipart/form-data">
    @csrf
<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Tambah data jasa</h1>
    </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" value="{{ old('nama_jasa') }}" name="nama_jasa" class="" id="nama_jasa" placeholder="Nama jasa">
        </div>

        <div class="form-group">
            <input type="text" class="form-control form-control-user" value="{{ old('deskripsi') }}" name="deskripsi" class="" id="deskripsi" placeholder="deskripsi">
        </div>

        <div class="form-group">
            <input type="number" class="form-control form-control-user" value="{{ old('harga') }}" name="harga" class="" id="harga" placeholder="harga barang">
        </div>
        

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 text-right">
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Save Data
                </button>
            </div>
        </div>
</div>
</form>
@endsection

