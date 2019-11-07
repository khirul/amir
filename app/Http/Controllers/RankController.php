<?php

namespace App\Http\Controllers;

use App\Rank;
use Illuminate\Http\Request;
use Session;

class RankController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

  public function index()
  {
    $ranks = Rank::all();
    return view('pangkat.show',['ranks'=>$ranks]);
  }

  public function add()
    {
    	return view('pangkat.form');
    }
    

  public function store(){
    $this->validate(request(),[
        'rank_name'=>'required',
        ]);

        $rank=new Rank;
        $rank->rank_name=(request()->rank_name);
        $rank->save();
       
        Session::flash('flash_message', 'Pangkat berjaya dimasukkan!');
        return redirect('rank');
  }

  public function edit(Rank $rank)
    {
    	return view('pangkat.edit',['rank'=>$rank]);
    }

    public function update(Rank $rank, Request $request)
    {
        $this->validate(request(),
        [   'rank_name'=>'required'
        ]);
    	$rank->fill($request->all())->save();
    	Session::flash('flash_message', 'Pangkat berjaya dikemaskini!');

    	return redirect('rank');	
    }

    public function delete(Rank $rank)
    {
    	$rank->delete();
    	Session::flash('flash_message', 'Pangkat berjaya dihapuskan!');

    	return redirect('rank');
    }
}
