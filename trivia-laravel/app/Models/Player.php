<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; 

class Player extends Model
{
    // This defines a many-to-many relationship
    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class);
    }
}
