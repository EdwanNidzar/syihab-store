<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Brand extends Model
{
    protected $fillable = [
        'name', 'slug', 'logo', 'description', 'is_active'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    protected $withCount = ['products'];

    protected static function booted()
    {
        static::updating(function ($brand) {
            if ($brand->isDirty('logo')) {
                $oldLogo = $brand->getOriginal('logo');
                if ($oldLogo && Storage::disk('public')->exists($oldLogo)) {
                    Storage::disk('public')->delete($oldLogo);
                }
            }
        });
        
        static::deleting(function ($brand) {
            if ($brand->logo && Storage::disk('public')->exists($brand->logo)) {
                Storage::disk('public')->delete($brand->logo);
            }
        });
    }

    // public function gsktipe()
    // {
    //     return $this->hasMany(GskTipe::class);
    // }

    public function gskProductDisplay()
    {
        return $this->hasMany(GskProductDisplay::class);
    }

}
