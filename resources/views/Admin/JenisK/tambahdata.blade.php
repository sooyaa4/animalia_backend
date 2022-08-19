@extends('Admin.halaman')

@section('content')


<form class="user" action="{{ route('jenis.store') }}" method="post" enctype="multipart/form-data">
    @csrf
<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Tambah data jenis pengiriman</h1>
    </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" value="{{ old('nama_jenis_kirim') }}" name="nama_jenis_kirim" class="" id="nama_jenis_kirim" placeholder="Nama jenis pengiriman">
        </div>

        <div class="form-group">
            <input type="number" class="form-control form-control-user" value="{{ old('ongkir') }}" name="ongkir" class="" id="ongkir" placeholder="Ongkos kirim">
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

