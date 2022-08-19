<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailBarang extends Model
{
    use HasFactory;
    public $table = 'detail_transaksi_barang';
    protected $guarded = ['id'];

    public function produk()
    {
        return $this->hasOne(Produk::class, 'id', 'produk_id');
    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class);
    }
    
}
