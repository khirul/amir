<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $fillable = [
        'rank_name'
    ];

    public function User()
    {
        return $this->hasMany(User::class);
    }
}
