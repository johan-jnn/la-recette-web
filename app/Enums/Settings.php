<?php

namespace App\Enums;

use App\Models\Setting;

enum Settings: int
{
    case LUMA_API_KEY = 0;
    case TRUST_PILOT_URL = 1;

    public function model()
    {
        return Setting::findOrFail($this->value);
    }
}
