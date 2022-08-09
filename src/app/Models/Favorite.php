<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'radio_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function radio(): BelongsTo
    {
        return $this->belongsTo('App\Models\radio');
    }
}
