@extends('Admin.halaman')

@section('content')


<form class="user" action="{{ route('produkbar.store') }}" method="post" enctype="multipart/form-data">
    @csrf
<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Tambah data produk</h1>
    </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" value="{{ old('nama_barang') }}" name="nama_barang" class="" id="produk_nama" placeholder="Nama produk">
        </div>

        <div class="form-group">
            <input type="text" class="form-control form-control-user" value="{{ old('merk_barang') }}" name="merk_barang" class="" id="merk_barang" placeholder="Merk barang">
        </div>
        
        <div class="form-group">
            <select name="kategori_id" class="form-control form-control-user" id="grid-last-name" placeholder="Kategori barang">
                <option value="" selected>- Pilih Kategori -</option>
                @foreach ($kategori as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <input type="text" class="form-control form-control-user" value="{{ old('deskripsi_barang') }}" name="deskripsi_barang" class="" id="deskripsi_barang" placeholder="Deskripsi barang">
        </div>

        <div class="form-group">
            <input type="number" class="form-control form-control-user" value="{{ old('berat') }}" name="berat" class="" id="berat" placeholder="Berat barang">
        </div>

        <div class="form-group">
            <select name="satuan" class="form-control form-control-user" id="grid-last-name" placeholder="Satuan Berat barang">
                <option value="" selected>- Pilih -</option>
                <option value="Gram" selected>- Gram -</option>
                <option value="Kilo" selected>- Kilo -</option>>
            </select>
        </div>

        <div class="form-group">
            <input type="number" class="form-control form-control-user" value="{{ old('harga') }}" name="harga" class="" id="harga" placeholder="harga barang">
        </div>

        <div class="form-group">
            <input type="number" class="form-control form-control-user" value="{{ old('stok') }}" name="stok" class="" id="stok" placeholder="stok barang">
        </div>
        
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 text-right">
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Save Product
                </button>
            </div>
        </div>
</div>
</form>
@endsection

