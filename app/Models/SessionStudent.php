<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class SessionStudent extends Pivot
{

    protected $casts = [
        'is_present' => 'boolean'
    ];
}
