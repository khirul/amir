<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'state_name'
    ];

    public function User()
    {
        return $this->hasMany(User::class);
    }

    public function District()
    {
        return $this->hasMany(District::class);
    }
}
