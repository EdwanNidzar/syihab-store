<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyPromo extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
