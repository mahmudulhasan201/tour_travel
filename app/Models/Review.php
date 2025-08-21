<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = [];

    public function getImageAttribute($value)
    {
        return $value;
    }

    public function getImageUrlAttribute()
    {
        return $this->image
            ? url('/images/reviews/' . $this->image)
            : url('/images/user.png');
    }
}
