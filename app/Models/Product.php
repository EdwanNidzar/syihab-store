<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'brand_id', 'name', 'slug', 'description', 'specs', 'variations',
        'image', 'gallery', 'is_preorder', 'is_active',
    ];

    protected $casts = [
        'specs' => 'array',
        'variations' => 'array',
        'gallery' => 'array',
        'is_preorder' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
}
