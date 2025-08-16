<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    protected $fillable = ['email', 'password'];
    protected $hidden = ['password'];

    public function getImageAttribute($value)
    {
        return $value;
    }

    public function getImageUrlAttribute()
    {
        return $this->image
            ? url('/images/users/' . $this->image)
            : url('/images/user.png');
    }
}
