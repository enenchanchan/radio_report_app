<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Radio extends Model
{
    protected $fillable = ['radio_id', 'radio_title', 'radio_date', 'broadcaster', 'radio_about'];

    public function Article(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Article')->withTimestamps();
    }
    use HasFactory;

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'favorites')->withTimestamps();
    }

    public function favoriteby(?User $user): bool
    {
        return $user
            ? (bool)$this->favorites->where('id', $user->id)->count() : false;
    }
}
