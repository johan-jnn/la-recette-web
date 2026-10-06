<?php

namespace App\Enums;

use App\Models\Setting;

enum Settings: int
{
    public function model()
    {
        return Setting::findOrFail($this->value);
    }
}
