<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MstPrefecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];



    public function user(): HasOne
    {
        return $this->hasOne(user::class, 'prefecture_id');
    }
}
