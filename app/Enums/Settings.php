<?php

namespace App\Enums;

use App\Models\Setting;

enum Settings: int
{
    case LUMA_API_KEY = 0;
    case TRUST_PILOT_URL = 1;
    case LISTEN_NOTES_API_KEY = 3;

    public function model(array|string $columns = ['*'])
    {
        return Setting::findOrFail($this->value, $columns);
    }
}
