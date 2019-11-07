<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'state_id',
        'district_name'
    ];
    
    public function State()
    {
        return $this->belongsTo(State::class);
    }

    public function User()
    {
        return $this->hasMany(User::class);
    }
}
