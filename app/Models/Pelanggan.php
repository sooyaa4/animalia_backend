<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    public $table = 'pelanggan';
    protected $guarded = ['id'];


    public function Transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function scopeFilter($query, array $filters)
    // {
    //     $query->when($filters['search'] ?? false, function ($query, $search) {
    //         $query->select('pelanggan.*');
    //         $query->join('users', 'pelanggan.user_id', '=', 'users.id');
    //         $query->where('pelanggan.nama', 'like', '%' . $search . '%');
    //         return $query;
    //     });
    // }
}

