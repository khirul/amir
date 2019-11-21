<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'no_badan',
        'jawatan',
        'email', 
        'cawangan',
        'kontinjen',
        'password', 
        'role',
        'category_id',
        'rank_id',
        'categorycontingent_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Journal()
    {
        return $this->hasMany(Journal::class);
    }

    public function Comment() {
        return $this->hasMany(Comment::class);
    }
    
    public function Penyelia()
    {
        return $this->hasMany(Journal::class,'penyelia','id');
    }
    
    // seksyen-ba
    public function Category()
    {
         return $this->belongsTo(Category::class);
    }

    // subseksyen-ba
    public function Subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function Roles() 
    {
        return $this->hasMany(Role::class);
    }

     // seksyen-kontinjen
     public function Seksyen()
     {
        //   return $this->belongsTo(Seccontingent::class);
        return $this->belongsTo('App\Seccontingent', 'seccontingent_id', 'id');
     }
 
     // subseksyen-kontinjen
     public function Subseksyen()
     {
        // return $this->belongsTo(SubSeccontingent::class);
        return $this->belongsTo('App\SubSeccontingent', 'sub_seccontingent_id', 'id');
     }

    public function Kontinjen()
    {
        //  return $this->belongsTo(Contingent::class);
        return $this->belongsTo('App\Contingent', 'kontinjen', 'id');
    }

    // seksyen-daerah
    public function State()
    {
        return $this->belongsTo('App\State', 'state_id', 'id');
        //  return $this->belongsTo(State::class);
    }

    // subseksyen-daerah
    public function District()
    {
        return $this->belongsTo(District::class);
    }

    public function Pangkat()
    {
        return $this->belongsTo('App\Rank', 'rank_id', 'id');
    }
}
