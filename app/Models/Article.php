<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('title', 'description', 'thumbnail_path', 'body')]
class Article extends Model
{
    public function experience()
    {
        return $this->hasOne(Experience::class, 'experience_id', 'id');
    }
}
