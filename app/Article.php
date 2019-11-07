<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [
        
    ];
    protected $table = 'articles';
    public function Journal()
    {
        return $this->belongsTo('App\Journal', 'journal_id', 'id');
        // return $this->belongsTo(Journal::class);
    }
}
