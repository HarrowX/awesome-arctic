<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Tutor extends Authenticatable
{
    protected $fillable = [
        'email',
        'name',
        'password',
        'avatar',
    ];
}
