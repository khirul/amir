<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccontingent extends Model
{
    protected $fillable = [
        'section_name'
    ];

    // penyelia
    public function User()
    {
        return $this->hasMany(User::class);
    }

    // subseksyen
    public function Subseksyen()
    {
        return $this->hasMany(SubSeccontingent::class);
    }
}
