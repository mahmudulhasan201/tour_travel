<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalOffice extends Model
{
    protected $guarded = [];

    protected $casts = [
        'contacts' => 'array', // ✅ Laravel will JSON encode/decode automatically
    ];
}
