<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    } 

    public function film(): BelongsTo
    {
        return $this->belongsTo(Film::class);
    } 
}
