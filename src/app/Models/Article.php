<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    protected $fillable = [
        'radio_id',
        'radio_date',
        'body',
        'link'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function radio()
    {
        return $this->belongsTo(Radio::class);
    }
    use HasFactory;
}
