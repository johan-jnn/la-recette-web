<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'description', 'publish_date', 'duration'])]
class Podcast extends Model
{
    protected $optionals = [
        'duration',
    ];

    public function urls()
    {
        return $this->hasMany(PodcastUrl::class, 'podcast_id', 'id');
    }
}
