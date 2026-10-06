<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'description', 'content'])]
class SingletonContents extends Model
{
    protected $casts = [
        'content' => 'array',
    ];
}
