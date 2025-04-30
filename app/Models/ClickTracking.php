<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClickTracking extends Model
{
    protected $fillable = [
        'page',
        'cta_name',
        'clicks',
    ];
}
