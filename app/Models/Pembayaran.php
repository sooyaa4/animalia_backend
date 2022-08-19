<?php

namespace App\Models;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory;
    public $table = 'pembayaran';
    protected $guarded = ['id'];

    public function metodbayar()
    {
        return $this->belongsTo(MetodeBayar::class, 'metode_id', 'id');
    }

    public function getGetBuktiAttribute($url)
    {
        return config('app.url') . Storage::url($url);
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
    }


}
