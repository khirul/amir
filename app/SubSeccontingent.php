<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSeccontingent extends Model
{
    protected $fillable = [
        'seccontingent_id',
        'subsection_name'
    ];
    
    public function Seksyen()
    {
        // return $this->belongsTo(Seccontingent::class);
        return $this->belongsTo('App\Seccontingent', 'seccontingent_id', 'id');
    }

     // penyelia
     public function User()
     {
         return $this->hasMany(User::class);
     }
}
