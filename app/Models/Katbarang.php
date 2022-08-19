<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katbarang extends Model
{
    use HasFactory;
    public $table = 'kategori_barang';
    protected $fillable = [
        'nama_kategori'
    ];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'kategori_id','id');
    }
}
