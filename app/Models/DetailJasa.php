<?php

namespace App\Models;

use App\Models\Jasa;
use App\Models\Layanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailJasa extends Model
{
    use HasFactory;
    public $table = 'detail_transaksi_jasa';
    protected $guarded = ['id'];

    public function layanan()
    {
        return $this->hasOne(Layanan::class, 'id', 'layanan_id');
    }

    public function jasa()
    {
        return $this->hasOne(Jasa::class, 'id', 'jasa_id');
    }

}
