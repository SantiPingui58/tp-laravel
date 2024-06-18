<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreItem extends Model
{
    use HasFactory;

    protected $table = 'productos';

    public function image()
    {
        return $this->belongsTo(Image::class, 'imagen_id');
    }
}
