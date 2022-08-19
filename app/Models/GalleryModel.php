<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryModel extends Model
{
    use HasFactory;
    public $table = 'gallery';
    protected $guarded = ['id'];

    public function getUrlAttribute($url)
    {
        return config('app.url') . Storage::url($url);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'id');
    }
}
