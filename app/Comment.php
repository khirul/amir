<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = 
    ['user_id', 
    'journal_id', 
    'comment'
    ];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function Journal() {
    	return $this->belongsTo(Journal::class);
    }

}
