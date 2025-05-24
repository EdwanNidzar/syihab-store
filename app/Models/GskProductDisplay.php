<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GskProductDisplay extends Model
{
    protected $fillable = [
        'brand_id',
        'product_name',
        'slug',
        'image',
        'price',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

}