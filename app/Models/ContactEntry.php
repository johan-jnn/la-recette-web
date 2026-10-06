<?php

namespace App\Models;

use App\Enums\ContactType;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

#[Fillable('first_name', 'last_name', 'email', 'phone', 'object', 'message', 'type', 'company_name')]
class ContactEntry extends Model
{
    protected $casts = [
        'type' => ContactType::class
    ];

    public function experiences()
    {
        return $this->hasManyThrough(Experience::class, ContactExperience::class, 'contact_id', 'experience_id', 'id', 'id');
    }
}
