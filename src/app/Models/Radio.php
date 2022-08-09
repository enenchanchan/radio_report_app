<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Radio extends Model
{
    protected $fillable = ['radio_id', 'radio_title', 'radio_date', 'start_time', 'end_time', 'broadcaster', 'radio_about', 'image'];

    public function Articles(): HasMany
    {
        return $this->hasMany('App\Models\Article')->withTimestamps();
    }
    use HasFactory;


    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'favorites')->withPivot('created_at');
    }

    public function isfavoritedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->favorites->where('id', $user->id)->count()
            : false;
    }

    public function getCountFavoritesAttribute(): int
    {
        return $this->favorites->count();
    }
}
