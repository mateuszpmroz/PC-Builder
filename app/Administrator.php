<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Administrator extends Model
{
    protected $fillable = array('user_id');

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
