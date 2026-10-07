<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('title', 'description', 'thumbnail_url', 'body', 'experience_id')]
class Article extends Model
{
    public function experience()
    {
        return $this->belongsTo(Experience::class, 'experience_id', 'id');
    }
}
