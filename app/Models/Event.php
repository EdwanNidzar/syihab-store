<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'video',
    ];

    protected $casts = [
        'video' => 'array',
    ];

    protected static function booted()
    {
        static::updating(function ($event) {
            // Hapus thumbnail lama jika diubah
            if ($event->isDirty('thumbnail')) {
                $oldImage = $event->getOriginal('thumbnail');
                if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }

            // Hapus video lama jika diubah
            if ($event->isDirty('video')) {
                $oldVideos = $event->getOriginal('video') ?? [];
                foreach ($oldVideos as $video) {
                    if ($video && Storage::disk('public')->exists($video['file'] ?? $video)) {
                        Storage::disk('public')->delete($video['file'] ?? $video);
                    }
                }
            }
        });

        static::deleting(function ($event) {
            // Hapus thumbnail
            if ($event->thumbnail && Storage::disk('public')->exists($event->thumbnail)) {
                Storage::disk('public')->delete($event->thumbnail);
            }

            // Hapus semua video
            foreach ($event->video ?? [] as $video) {
                if ($video && Storage::disk('public')->exists($video['file'] ?? $video)) {
                    Storage::disk('public')->delete($video['file'] ?? $video);
                }
            }
        });
    }
}
