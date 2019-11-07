<?php

namespace App\Http\Controllers;

use Session;

use App\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
      $states = State::all();
        return view('negeri.show',['states'=>$states]);
    }

    public function add()
    {
    	return view('negeri.form');
    }

    public function store(){
        $this->validate(request(),[
            'state_name'=>'required',
            ]);
    
            $state=new State;
            $state->state_name=(request()->state_name);
            $state->save();
           
            Session::flash('flash_message', 'Negeri berjaya dimasukkan!');
            return redirect('state');
      }

    public function edit(State $state)
    {
    	return view('negeri.edit',['state'=>$state]);
    }

    public function update(State $state, Request $request)
    {
        $this->validate(request(),
        [   'state_name'=>'required'
        ]);
    	$state->fill($request->all())->save();
    	Session::flash('flash_message', 'Negeri berjaya dikemaskini!');

    	return redirect('state');	
    }

    public function delete(State $state)
    {
    	$state->delete();
    	Session::flash('flash_message', 'Negeri berjaya dihapuskan!');

    	return redirect('state');
    }
}
