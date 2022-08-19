<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    public $table = 'produk_barang';
    protected $guarded = ['id'];

    public function katbarang()
    {
        return $this->belongsTo(Katbarang::class, 'kategori_id', 'id');
    }

    public function galeri()
    {
        return $this->hasMany(GalleryModel::class, 'produk_id', 'id');
    }

    public function barangmasuk()
    {
        return $this->hasMany(BarangMasuk::class, 'produk_id', 'id');
    }
}
