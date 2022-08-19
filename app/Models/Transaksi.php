<?php

namespace App\Models;

use App\Models\Pelanggan;
use App\Models\DetailJasa;
use App\Models\DetailBarang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;
    public $table = 'transaksi';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function karyawan()
    {
        return $this->hasOne(Karyawan::class, 'id', 'karyawan_id');
    }

    public function detailjasa()
    {
        return $this->hasMany(DetailJasa::class, 'transaksi_id', 'id');
    }

    public function detailbarang()
    {
        return $this->hasMany(DetailBarang::class, 'transaksi_id', 'id');
    }

    public function pengiriman()
    {
        return $this->hasMany(Pengiriman::class, 'transaksi_id', 'id');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'transaksi_id', 'id');
    }
    
}
