<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKirim extends Model
{
    use HasFactory;
    public $table = 'jenis_pengiriman';
    protected $guarded = ['id'];

    public function pengiriman()
    {
        return $this->hasMany(Pengiriman::class, 'jenisKirim_id', 'id');
    }
}
