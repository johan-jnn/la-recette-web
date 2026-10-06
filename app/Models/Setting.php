<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['id', 'label', 'value'])]
class Setting extends Model
{
    public $incrementing = false;

    // No "created_at" column as the settings creation is not important
    public const CREATED_AT = null;
}
