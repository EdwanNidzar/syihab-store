<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DailyPromo extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'is_active',
        'is_popups',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_popups' => 'boolean',
    ];

    protected static function booted()
    {
        static::updating(function ($brand) {
            if ($brand->isDirty('image')) {
                $oldImage = $brand->getOriginal('image');
                if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });
        
        static::deleting(function ($brand) {
            if ($brand->image && Storage::disk('public')->exists($brand->image)) {
                Storage::disk('public')->delete($brand->image);
            }
        });
    }
}
