<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('title', 'presentation', 'thumbnail_path', 'luma_event_id')]
class Experience extends Model
{
    public function contacts()
    {
        return $this->hasManyThrough(ContactEntry::class, ContactExperience::class, 'experience_id', 'contact_id', 'id', 'id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'id', 'article_id');
    }
}
