<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'brand_id', 'name', 'slug', 'description', 'specs', 'variations',
        'image', 'gallery', 'google_form_link', 'is_featured', 'is_active',
    ];

    protected $casts = [
        'specs' => 'array',
        'variations' => 'array',
        'gallery' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
}
