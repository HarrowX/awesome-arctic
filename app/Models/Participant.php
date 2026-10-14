<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Participant extends Authenticatable
{
    protected $fillable = [
        'email',
        'name',
        'surname',
        'patronymic',
        'password',
        'avatar',
        'vk_id',
        'birthday',
        'contact_info',
        'gender',
    ];

    public function schoolData(): HasOne
    {
        return $this->hasOne(SchoolData::class);
    }

    public function formattedFio(): string
    {
        return $this->surname.' '.$this->name.' '.$this->patronymic;
    }
}
