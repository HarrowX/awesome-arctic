<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SchoolData extends Model
{
    protected $fillable = [
        'participant_id',
        'school_id',
        'class',
    ];

    public function participant(): BelongsTo
    {
        return $this->belongsTo(Participant::class);
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}
