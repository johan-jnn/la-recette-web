<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['platform', 'url'])]
class PodcastUrl extends Model
{
    protected $casts = [
        'platform' => Platform::class,
    ];

    public function podcast()
    {
        return $this->belongsTo(Podcast::class, 'podcast_id', 'id');
    }
}
