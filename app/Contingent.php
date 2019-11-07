<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contingent extends Model
{
    protected $fillable = [
        'kontinjen_name'
    ];

    public function User()
    {
        return $this->hasMany(User::class);
    }
}
