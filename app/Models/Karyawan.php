<?php

namespace App\Models;

use App\Models\Jabatan;
use App\Models\Transaksi;
use App\Models\Pembayaran;
use App\Models\Pengiriman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Model
{
    use HasFactory;
    public $table = 'karyawan';
    // protected $guarded = ['id'];
    protected $fillable = [
        'user_id',
        'nama_karyawan',
        'no_hp',
        'jabatan_id',
    ];

    public function Transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function Pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function Pengiriman()
    {
        return $this->hasMany(Pengiriman::class);
    }

    public function Jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
