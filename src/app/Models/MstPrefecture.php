<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstPrefecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];



    public function users()
    {
        return $this->hasMany(user::class, 'prefecture_id');
    }
}
