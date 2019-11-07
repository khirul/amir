<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name'
    ];

    public function DamageRpt()
    {
        return $this->hasMany(DamageReport::class);
        
    }

    // penyelia
    public function User()
    {
        return $this->hasMany(User::class);
    }

    // subseksyen
    public function Subcategory()
    {
        return $this->hasMany(SubCategory::class);
    }
}
