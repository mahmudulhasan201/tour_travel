<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    public function getImageAttribute($value)
    {
        return $value;
    }

    public function getImageUrlAttribute()
    {
        return $this->image
            ? url('/images/services/' . $this->image)
            : url('/images/user.png');
    }
}
