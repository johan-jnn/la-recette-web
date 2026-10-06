<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('title', 'presentation', 'thumbnail_path', 'luma_event_id')]
class Experience extends Model
{

}
