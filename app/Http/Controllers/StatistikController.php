<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DamageReport;
use App\Http\Requests;
use DB;

class StatistikController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $list=DamageReport::orderBy('tarikh_masuk', 'desc')->get();
        return view('statistik.search',['list'=>$list]);
    	
    }

    public function search(Request $request)
    {   
        // dd($_POST);
        $this->validate(request(),[
            'tarikh_dari'=>'required',
            'tarikh_hingga'=>'required'
            ]);

            $list = DamageReport::whereBetween('tarikh_masuk', [$request->tarikh_dari, $request->tarikh_hingga])->get();
            return view('statistik.show', compact('list'));
	     
    }

    public function indexSelesai()
    {
    	
        return view('statistik.searchSelesai');
       
    }

    // public function searchSelesai(Request $request)
    // {   
    //     // dd($_POST);
    //     $this->validate(request(),[
    //         'tarikh_dari'=>'required',
    //         'tarikh_hingga'=>'required'
    //         ]);
    //         $list = DamageReport::whereNotNull('status_laporan', [$request->tarikh_dari, $request->tarikh_hingga])->get();
    //         return view('statistik.showSelesai', compact('list'));
	     
    // }

    // Search selesai keseluruhan
    public function searchSelesai(Request $request)
    {   
        // dd($_POST);
        $this->validate(request(),[
            'tarikh_dari'=>'required',
            'tarikh_hingga'=>'required'
            ]);

            $list = DamageReport::whereNotNull('status_laporan')->get();
            return view('statistik.showSelesai', compact('list'));
	     
    }

    // public function searchSelesai(Request $request)
    // {   
    //     // dd($_POST);
    //     $this->validate(request(),[
    //         'tarikh_dari'=>'required',
    //         'tarikh_hingga'=>'required'
    //         ]);
    //         // $list = DamageReport::whereNotNull(false)->get(['status_laporan'])->toArray();
    //         $list = DamageReport::whereNotNull('status_laporan', [$request->tarikh_dari, $request->tarikh_hingga])->get()->toArray();
    //         return view('statistik.showSelesai', compact('list'));
	     
    // }
}
