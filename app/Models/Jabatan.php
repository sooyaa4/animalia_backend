<?php

namespace App\Models;

use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jabatan extends Model
{
    use HasFactory;
    public $table = 'jabatan';
    protected $guarded = ['id'];

    public function karyawan()
    {
        return $this->hasOne(Karyawan::class, 'jabatan_id', 'id');
    }
}
