<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricesList extends Model
{
    protected $table = 'prices_lists';

    protected $fillable = ['list','slug','picture'];

    protected $casts = [
        'picture' => 'array',
    ];
}
