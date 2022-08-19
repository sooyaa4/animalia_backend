@extends('Admin.halaman')

@section('content')


<form class="user" action="{{ route('metode.store') }}" method="post" enctype="multipart/form-data">
    @csrf
<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Tambah data metode bayar</h1>
    </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" value="{{ old('nama_metode') }}" name="nama_metode" class="" id="nama_metode" placeholder="Nama metode bayar">
        </div>

        <div class="form-group">
            <input type="number" class="form-control form-control-user" value="{{ old('nomer_rek') }}" name="nomer_rek" class="" id="nomer_rek" placeholder="Nomer rekening">
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

