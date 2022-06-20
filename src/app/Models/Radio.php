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
}
