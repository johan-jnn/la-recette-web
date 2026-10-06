<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['description', 'publish_date'])]
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
