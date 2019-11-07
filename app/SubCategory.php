<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'category_id',
        'subcategory_name'
    ];
    
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function DamageRpt()
    {
        return $this->hasMany(DamageReport::class);
        
    }

    // penyelia
    public function User()
    {
        return $this->hasMany(User::class);
    }
    
}
