<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GskHpSecond extends Model
{
    protected $table = 'gsk_hp_seconds';

    protected $fillable = [
        'gsk_tipe_id',
        'storage',
        'condition',
        'qualification',
        'price',
        'image',
    ];

    public function gskTipe()
    {
        return $this->belongsTo(GskTipe::class);
    }
}
