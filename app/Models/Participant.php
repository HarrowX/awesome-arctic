<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Participant extends Authenticatable
{
    protected $fillable = [
        'email',
        'name',
        'password',
        'avatar',
    ];
}
