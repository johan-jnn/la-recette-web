<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('title', 'thumbnail_url', 'slider_images_url', 'presentation', 'luma_event_id')]
class Experience extends Model
{
    protected $casts = [
        'slider_images_url' => 'array'
    ];

    public function contacts()
    {
        return $this->hasManyThrough(ContactEntry::class, ContactExperience::class, 'contact_id', 'id', 'id', 'experience_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'id', 'article_id');
    }
}
