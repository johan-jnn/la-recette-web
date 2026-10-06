<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['id', 'label', 'value'])]
class Setting extends Model
{
    public $incrementing = false;
}
