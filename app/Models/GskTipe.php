<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GskTipe extends Model
{
    protected $table = 'gsk_tipes';

    protected $fillable = [
        'brand_id',
        'tipe',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function gskHpSeconds()
    {
        return $this->hasMany(GskHpSecond::class);
    }
}
