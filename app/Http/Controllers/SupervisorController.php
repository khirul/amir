<?php

namespace App\Http\Controllers;

use Session;
use App\Rank;
use App\Role;
use App\User;
use App\State;
use App\Category;
use App\Contingent;
use App\SubCategory;
use App\Http\Requests;
use App\Seccontingent;
use App\SubSeccontingent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupervisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // pemproses
    private $rules = [
        'name'=> 'required',
        'email'=> 'required|email|unique:users'
    ];

    public function index()
 	{
        $penyelia = [];
        $role = Role::all();
        foreach ($role as $r) {
            if($r->name == "pemproses" && $r->User->cawangan =='Bukit Aman'){
                $penyelia[] = $r->user;
            }
        }
 		return view('penyelia.index',['penyelia'=>$penyelia]);
     }
     
    public function edit(User $petugas)
 	{
 		return view('penyelia.edit',['petugas'=>$petugas]);
 	}
 	public function update(User $petugas,Request $request)
 	{
 		$this->rules['email'].=',email,'.$petugas->email.',email';
    	$this->validate($request,$this->rules);
		$petugas->fill($request->all());
		$petugas->password=bcrypt(request()->password);
		$petugas->save();
    	Session::flash('flash_message', 'Profil penyelia 1 berjaya dikemaskini!');

    	return redirect('senarai_penyelia');

     }
     
     public function delete(User $petugas)
    {
    	$petugas->delete();
    	Session::flash('flash_message', 'Profil penyelia 1 berjaya dihapus!');

    	return redirect('senarai_penyelia');
    }

    public function add()
    {
        $ranks= Rank::all();
        $categories= Category::all();
        return view('penyelia.add', compact('categories','ranks'));
 		// return view('penyelia.add');
    	
    }

    public function getSubcategory($id)
    {
        $subcategory = SubCategory::where("category_id",$id)->get();
        return response()->json($subcategory);
    }
    // **********

    // public function store(Request $request)
    // {
    // 	$this->rules['password']='required';
    // 	$this->validate($request, $this->rules);
    // 	 $input = $request->all();
    // 	 $input['password'] = bcrypt($input['password']);
    // 	 $input['role']= 'penyelia';
    // 	 $input['status']= 1;
	//     User::create($input);
	//     Session::flash('flash_message', 'Profil penyelia berjaya dimasukkan!');

	//     return redirect('senarai_penyelia');
    // }

    public function store()
    {   
        // dd($_POST);
        $this->validate(request(),[
            'name'=>'required',
            'no_badan'=>'required',
            'rank'=>'required',
            'jawatan'=>'required',
            'email'=>'required',
            'cawangan'=>'required',
            'category'=>'required',
            'role' => 'required',
            'password' => 'required'
            
            ]);
           
        $user = new User;
        $user->name=(request()->name);
        $user->no_badan=(request()->no_badan);
        $user->jawatan=(request()->jawatan);
        $user->rank_id = request()->rank;
        $user->email=(request()->email);
        $user->cawangan=(request()->cawangan);
        $user->password=bcrypt(request()->password);
        $user->status=(request()->status);
        $user->category_id = request()->category;
        $user->subcategory_id = request()->subcategory_id;
        // dd($_POST);
        if($user->save()){
            $role = new Role;
            $role->name = request()->role;
            $role->user_id = $user->id;
            $role->save();
        }
        Session::flash('flash_message', 'Profil penyelia 1 berjaya dimasukkan!');
        return redirect('senarai_penyelia');
    }

    public function tugasan(User $staff)
    {
    	return view('penyelia.tugasan',['staff'=>$staff]);
    }


    // penyelia1-kontinjen
    public function indexKontinjen()
 	{
        $penyelia = [];
        $role = Role::all();
        foreach ($role as $r) {
            if($r->name == "pemproses" && $r->User->cawangan =='Kontinjen'){
                $penyelia[] = $r->user;
            }
        }
 		return view('kontinjen.penyelia.index',['penyelia'=>$penyelia]);
     }

    public function addKontinjen()
    {
        $ranks= Rank::all();
        $categories= Seccontingent::all();
        $contingents= Contingent::all();
        return view('kontinjen.penyelia.add', compact('categories','contingents','ranks'));
    }

    public function getSubcategoryKontinjen($id)
    {
        $subcategory = SubSeccontingent::where("seccontingent_id",$id)->get();
        return response()->json($subcategory);
    }

    public function storeKontinjen()
    {   
        // dd($_POST);
        $this->validate(request(),[
            'name'=>'required',
            'no_badan'=>'required',
            'rank'=>'required',
            'jawatan'=>'required',
            'email'=>'required',
            'kontinjen'=>'required',
            'seksyen'=>'required',
            'password' => 'required'
            
            ]);
           
        $user = new User;
        $user->name=(request()->name);
        $user->no_badan=(request()->no_badan);
        $user->jawatan=(request()->jawatan);
        $user->rank_id = request()->rank;
        $user->email=(request()->email);
        $user->cawangan=(request()->cawangan);
        $user->kontinjen=(request()->kontinjen);
        $user->seccontingent_id = request()->seksyen;
        $user->sub_seccontingent_id = request()->subcategorycontingent_id;
        $user->password=bcrypt(request()->password);
        $user->status=(request()->status);
        if($user->save()){
            $role = new Role;
            $role->name = request()->role;
            $role->user_id = $user->id;
            $role->save();
        }
	    Session::flash('flash_message', 'Profil penyelia 1 berjaya dimasukkan!');
        return redirect('senarai_penyelia_kontinjen');
    }

    public function editKontinjen(User $petugas)
 	{
 		return view('kontinjen.penyelia.edit',['petugas'=>$petugas]);
    }
     
 	public function updateKontinjen(User $petugas,Request $request)
 	{
 		$this->rules['email'].=',email,'.$petugas->email.',email';
    	$this->validate($request,$this->rules);
		$petugas->fill($request->all());
		$petugas->password=bcrypt(request()->password);
		$petugas->save();
    	Session::flash('flash_message', 'Profil penyelia 1 berjaya dikemaskini!');
    	return redirect('senarai_penyelia_kontinjen');
     }

    public function deleteKontinjen(User $petugas)
    {
        $petugas->delete();
        Session::flash('flash_message', 'Profil penyelia 1 berjaya dihapus!');
        return redirect('senarai_penyelia_kontinjen');
    }
    

    // Penyelia-daerah
    public function indexDaerah()
 	{
        $penyelia = [];
        $role = Role::all();
        foreach ($role as $r) {
            if($r->name == "pemproses" && $r->User->cawangan =='Daerah'){
                $penyelia[] = $r->user;
            }
        }
 		return view('daerah.penyelia.index',['penyelia'=>$penyelia]);
     }

    public function addDaerah()
    {
        $ranks= Rank::all();
        $states= State::all();
        return view('daerah.penyelia.add', compact('states','ranks'));
    }

    public function getSubcategoryDaerah($id)
    {
        $district = District::where("state_id",$id)->get();
        return response()->json($district);
    }

    public function storeDaerah()
    {   
        // dd($_POST);
        $this->validate(request(),[
            'name'=>'required',
            'no_badan'=>'required',
            'rank'=>'required',
            'jawatan'=>'required',
            'email'=>'required',
            'negeri'=>'required',
            'password' => 'required'
            
            ]);
           
        $user = new User;
        $user->name=(request()->name);
        $user->no_badan=(request()->no_badan);
        $user->jawatan=(request()->jawatan);
        $user->rank_id = request()->rank;
        $user->email=(request()->email);
        $user->cawangan=(request()->cawangan);
        $user->state_id = request()->negeri;
        $user->district_id = request()->daerah;
        $user->password=bcrypt(request()->password);
        $user->status=(request()->status);
        if($user->save()){
            $role = new Role;
            $role->name = request()->role;
            $role->user_id = $user->id;
            $role->save();
        }
	    Session::flash('flash_message', 'Profil penyelia 1 berjaya dimasukkan!');
        return redirect('senarai_penyelia_daerah');
    }

    public function editDaerah(User $petugas)
 	{
 		return view('daerah.penyelia.edit',['petugas'=>$petugas]);
    }
     
 	public function updateDaerah(User $petugas,Request $request)
 	{
 		$this->rules['email'].=',email,'.$petugas->email.',email';
    	$this->validate($request,$this->rules);
		$petugas->fill($request->all());
		$petugas->password=bcrypt(request()->password);
		$petugas->save();
    	Session::flash('flash_message', 'Profil penyelia 1 berjaya dikemaskini!');
    	return redirect('senarai_penyelia_daerah');
     }

    public function deleteDaerah(User $petugas)
    {
        $petugas->delete();
        Session::flash('flash_message', 'Profil penyelia 1 berjaya dihapus!');
        return redirect('senarai_penyelia_daerah');
    }
}
