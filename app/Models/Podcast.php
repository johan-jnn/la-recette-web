<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['description', 'publish_date', 'cover_path'])]
class Podcast extends Model
{
    protected $optionals = [
        'duration',
    ];
}
