<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; 

class Game extends Model
{
    // This defines a many-to-many relationship between games and players. 
    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class);
    }
}
