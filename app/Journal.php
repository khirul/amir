<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $guarded = [ 
       
    ]; 
    // protected $dates = ['tarikh_journal'];

    // Journal
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Comment() {
    	return $this->hasMany(Comment::class);
    }

    // utk show nama penyelia 1 di journal.show
    public function nama_penyelia(){
        $user = User::find($this->penyelia);
        return $user->name;
    }

    public function article()
    {
        // return $this->hasMany('App\Article', 'article_id', 'id');
        return $this->hasMany(Article::class);
    }

    // public function Petugas()
    // {
    //     return $this->belongsTo(User::class,'petugas','id');
    // }

    // public function Category()
    // {
    //      return $this->belongsTo(Category::class);
    // }

    // public function Subcategory()
    // {
    //     return $this->belongsTo(SubCategory::class);
    // }

}
