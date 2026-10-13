<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Jury extends Authenticatable
{
    protected $fillable = [
        'email',
        'name',
        'password',
        'avatar',
    ];
}
