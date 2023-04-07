<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Film extends Model
{
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
