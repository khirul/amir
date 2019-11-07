<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\DamageReport;
use App\User;
use App\Category;
use App\SubCategory;

class DamageReportController extends Controller
{
    public function index()
    {
    	$damageRpt=DamageReport::orderBy('created_at', 'desc')->get();
    	
        return view('damage.show',['damageRpt'=>$damageRpt]);
       
    }

    public function add()
    {
        $staff= User::where('role','petugas')->where('status',1)->get();
        $categories= Category::all();
        return view('damage.form', compact('staff','categories'));
        // return view('damage.form', compact('staff'));
    }

    // dependent dropdown
    public function getSubcategory($id)
    {
        $subcategory = SubCategory::where("category_id",$id)->get();
        return response()->json($subcategory);
    }
    // **********

    public function store()
    {   
        // dd($_POST);
        $this->validate(request(),[
            'name'=>'required',
            'tel'=>'required',
            'bahagian'=>'required',
            'code'=>'required',
            'category'=>'required',
            'jenis_kerosakan'=>'required',
            'tarikh_masuk'=>'required',
            'petugas'=>'required'
            
            ]);
           
        $laporan = new DamageReport;
        $laporan->name=(request()->name);
        $laporan->tel=(request()->tel);
        $laporan->bahagian=(request()->bahagian);
        $laporan->code=(request()->code);
        $laporan->category_id = request()->category;
        $laporan->subcategory_id = request()->subcategory_id;
        $laporan->jenis_kerosakan=(request()->jenis_kerosakan);
        $laporan->tarikh_masuk=(request()->tarikh_masuk);
        $laporan->petugas=(request()->petugas);
        $laporan->save();
	    Session::flash('flash_message', 'Laporan berjaya dimasukkan!');
        return redirect('laporan_kerosakan');
	     
    }

    public function edit(damageReport $laporan)
    {
        $staff= User::where('role','petugas')->where('status',1)->get();
        $categories= Category::all();
        $subcategories= SubCategory::all();
        return view('damage.edit',['laporan'=>$laporan,'staff'=>$staff,'categories'=>$categories,'subcategories'=>$subcategories]);
    }

    public function update(damageReport $laporan, Request $request)
    {
        // dd($_POST);
        $this->validate(request(),
        [   
            'name'=>'required',
            'tel'=>'required',
            'bahagian'=>'required',
            'code'=>'required',
            'category'=>'required',
            'subcategory_id'=>'required',
            'jenis_kerosakan'=>'required',
            'tarikh_masuk'=>'required',
            'petugas'=>'required'
        ]);

        $laporan->fill($request->all())->save();
    	Session::flash('flash_message', 'Laporan berjaya dikemaskini!');
    	return redirect('laporan_kerosakan');    	
    }

    public function action(damageReport $laporan)
    {
        $staff= User::where('role','petugas')->where('status',1)->get();
        $categories= Category::all();
        return view('damage.tindakan',['laporan'=>$laporan,'staff'=>$staff,'categories'=>$categories]);
    }

    public function updateAction(damageReport $laporan, Request $request)
    {
        $this->validate(request(),[
            'status_laporan'=>'required',
            'tarikh_keluar'=>'required',
            'nama_penerima'=>'required',
            'no_bdn_penerima'=>'required',
            'bahagian_penerima'=>'required',
            'tindakan'=>'required'
            ]);

        $laporan->fill($request->all())->save();
    	Session::flash('flash_message', 'Tindakan berjaya diambil!');

    	return redirect('laporan_kerosakan');
	
    }

    public function detailPenerima(damageReport $laporan)
    {
        
        return view('damage.maklumat_penerima',['laporan'=>$laporan]);
    }

    public function delete(damageReport $laporan)
    {
    	$laporan->delete();
    	Session::flash('flash_message', '	Laporan berjaya dihapuskan!');

    	return redirect('laporan_kerosakan');
    }
}
