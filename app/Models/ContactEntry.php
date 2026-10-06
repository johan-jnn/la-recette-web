<?php

namespace App\Models;

use App\Enums\ContactType;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('first_name', 'last_name', 'email', 'phone', 'object', 'message', 'type', 'company_name')]
class ContactEntry extends Model
{
    protected $casts = [
        'type' => ContactType::class
    ];
}
