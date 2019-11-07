<?php

namespace App\Http\Controllers;

use Session;

use App\State;
use App\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
      $districts = District::all();
      
        return view('senarai_daerah.show',['districts'=>$districts]);
    }

    public function add()
    {      
        $states= State::all();
        return view('senarai_daerah.form',['states'=>$states]);
    }

    public function store(){

        $this->validate(request(),[
            'district_name'=>'required',
            ]);
    
            $district=new District;
            $district->district_name=(request()->district_name);
            $district->state_id = request()->negeri;
            $district->save();
           
            Session::flash('flash_message', 'Daerah berjaya dimasukkan!');
            return redirect('district');
      }

    public function edit(District $district)
    {
    	return view('senarai_daerah.edit',['district'=>$district]);
    }

    public function update(District $district, Request $request)
    {
        $this->validate(request(),
        [   'district_name'=>'required'
        ]);

    	$district->fill($request->all())->save();
    	Session::flash('flash_message', 'Daerah berjaya dikemaskini!');
    	return redirect('district');	
    }

    public function delete(District $district)
    {
    	$district->delete();
    	Session::flash('flash_message', 'Daerah berjaya dihapuskan!');
    	return redirect('district');
    }

}
