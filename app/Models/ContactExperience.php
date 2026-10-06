<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('contact_id', 'experience_id')]
class ContactExperience extends Model
{
    public function contact()
    {
        return $this->belongsTo(ContactEntry::class, 'contact_id', 'id');
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class, 'experience_id', 'id');
    }
}
