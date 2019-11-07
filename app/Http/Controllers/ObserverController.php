<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use App\Observer;
use App\SubCategory;
use Illuminate\Http\Request;

class ObserverController extends Controller
{
    public function addObs()
    {
       $subname = [];
       $sub_id = [];
       $user=[];
       $penyelia=[];
       $penyelia_filter=[];

       foreach(request()->penyelia_sek as $r){
            $subname[] = $r;
       }
       foreach($subname as $p){
            $q = SubCategory::where('subcategory_name', $p)->first();
            $sub_id[]=$q->id;
        }
        $up = User::all();
        foreach($up as $r){
            if($r->Roles->first()->name == 'penyelia') {
                $penyelia[] = $r;
            }
        }
       foreach($sub_id as $sub){
            $u = User::where('subcategory_id', $sub)->first();
            $user[] = $u;
        }
        foreach($penyelia as $p){
            if(in_array($p->subcategory_id, $sub_id)){
                $penyelia_filter[] = $p;
            }
        }
        foreach($penyelia_filter as $pf){
            $obs = new Observer;
            $obs->journal_id = request()->id;
            $obs->user_id = $pf->id;
            $obs->catatan = 'sfsdf';
            $obs->save();
        }
    
        Session::flash('flash_message', 'Journal telah dihantar ke Pegawai Turus yang dipilih!');
        return redirect()->back();                 
    }                   
               
                
                
       

}
