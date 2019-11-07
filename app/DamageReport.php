<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DamageReport extends Model
{
    protected $fillable = [
        'code', 
        'name',
        'tel',
        'petugas',
        'bahagian',
        'category_id',
        'subcategory_id',
        'jenis_kerosakan',
        'tarikh_masuk',
        'status_laporan',
        'tarikh_keluar',
        'nama_penerima',
        'no_bdn_penerima',
        'tindakan',
        'bahagian_penerima'
    ]; 

    public function Petugas()
    {
        // return $this->belongsTo(\App\User::class,'lecturer','id');
        return $this->belongsTo(User::class,'petugas','id');
    }

    public function Category()
    {
        // return $this->belongsTo(\App\Category::class);
         return $this->belongsTo(Category::class);
    }
    public function Subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
