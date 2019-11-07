<?php

namespace App\Http\Controllers;

use Session;
use App\Rank;
use App\Role;
use App\User;
use App\State;
use App\Category;
use App\District;
use App\Contingent;
use App\SubCategory;
use App\Http\Requests;
use App\SecContingent;
use App\SubSecContingent;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private $rules = [
        'name'=> 'required',
        'email'=> 'required|email|unique:users'
    ];

    public function index()
 	{
        $staff = [];
        $role = Role::all();
        foreach ($role as $r) {
            if($r->name == "petugas" && $r->User->cawangan =='Bukit Aman'){
                $staff[] = $r->user;
            }
        }

 		return view('petugas.index',['staff'=>$staff]);
     }
     
    public function edit(User $petugas)
 	{
 		return view('petugas.edit',['petugas'=>$petugas]);
 	}
 	public function update(User $petugas,Request $request)
 	{
 		$this->rules['email'].=',email,'.$petugas->email.',email';
    	$this->validate($request,$this->rules);
		$petugas->fill($request->all());
		$petugas->password=bcrypt(request()->password);
		$petugas->save();
    	Session::flash('flash_message', 'Profil anggota berjaya dikemaskini!');

    	return redirect('senarai_anggota');

     }
     
     public function delete(User $petugas)
    {
    	$petugas->delete();
    	Session::flash('flash_message', 'Profil anggota berjaya dihapus!');

    	return redirect('senarai_anggota');
    }

    public function add()
    {
        $ranks= Rank::all();
		$categories= Category::all();
		return view('petugas.add', compact('categories','ranks'));
    	
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
    // 	 $input['role']= 'petugas';
    // 	 $input['status']= 1;
	//     User::create($input);
	//     Session::flash('flash_message', 'Profil anggota berjaya dimasukkan!');

	//     return redirect('senarai_anggota');
	// }
	
	public function store()
    {   
        // dd($_POST);
        $this->validate(request(),[
            'name'=>'required',
            'no_badan'=>'required|unique:users',
            'jawatan'=>'required',
            'email'=>'required',
            'cawangan'=>'required',
            'category'=>'required',
            'rank'=>'required',
            'password' => 'required'
            
            ]);
           
        $user = new User;
        $user->name=(request()->name);
        $user->no_badan=(request()->no_badan);
        $user->jawatan=(request()->jawatan);
        $user->email=(request()->email);
        $user->cawangan=(request()->cawangan);
        $user->password=bcrypt(request()->password);
        $user->status=(request()->status);
        $user->category_id = request()->category;
        $user->rank_id = request()->rank;
        $user->subcategory_id = request()->subcategory_id;
        if($user->save()){
            $role = new Role;
            $role->name = request()->role;
            $role->user_id = $user->id;
            $role->save();
        }
	    Session::flash('flash_message', 'Profil anggota berjaya dimasukkan!');
        return redirect('senarai_anggota');
	     
    }

    public function tugasan(User $staff)
    {
    	return view('petugas.tugasan',['staff'=>$staff]);
    }



    // user-kontinjen
    public function indexKontinjen()
 	{
        $staff = [];
        $role = Role::all();
        foreach ($role as $r) {
            if($r->name == "petugas" && $r->User->cawangan =='Kontinjen'){
                $staff[] = $r->user;
            }
        }
 		return view('kontinjen.petugas.index',['staff'=>$staff]);
     }

    public function addKontinjen()
    {
        $ranks= Rank::all();
        $categories= Seccontingent::all();
        $contingents= Contingent::all();
		return view('kontinjen.petugas.add', compact('categories','contingents','ranks'));
    	
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
            'no_badan'=>'required|unique:users',
            'jawatan'=>'required',
            'email'=>'required',
            'kontinjen'=>'required',
            'rank'=>'required',
            'seksyen'=>'required',
            'password' => 'required'
            
            ]);
           
        $user = new User;
        $user->name=(request()->name);
        $user->no_badan=(request()->no_badan);
        $user->jawatan=(request()->jawatan);
        $user->email=(request()->email);
        $user->cawangan=(request()->cawangan);
        $user->kontinjen=(request()->kontinjen);
        $user->seccontingent_id = request()->seksyen;
        $user->rank_id = request()->rank;
        $user->sub_seccontingent_id = request()->subcategorycontingent_id;
        $user->password=bcrypt(request()->password);
        $user->status=(request()->status);
        if($user->save()){
            $role = new Role;
            $role->name = request()->role;
            $role->user_id = $user->id;
            $role->save();
        }
	    Session::flash('flash_message', 'Profil anggota berjaya dimasukkan!');
        return redirect('senarai_anggota_kontinjen');
    }

    public function editKontinjen(User $petugas)
 	{
 		return view('kontinjen.petugas.edit',['petugas'=>$petugas]);
    }
     
 	public function updateKontinjen(User $petugas,Request $request)
 	{
 		$this->rules['email'].=',email,'.$petugas->email.',email';
    	$this->validate($request,$this->rules);
		$petugas->fill($request->all());
		$petugas->password=bcrypt(request()->password);
		$petugas->save();
    	Session::flash('flash_message', 'Profil anggota berjaya dikemaskini!');
    	return redirect('senarai_anggota_kontinjen');
     }

    public function deleteKontinjen(User $petugas)
    {
        $petugas->delete();
        Session::flash('flash_message', 'Profil anggota berjaya dihapus!');
        return redirect('senarai_anggota_kontinjen');
    }



    // user-daerah
    public function indexDaerah()
 	{
        $staff = [];
        $role = Role::all();
        foreach ($role as $r) {
            if($r->name == "petugas" && $r->User->cawangan =='Daerah'){
                $staff[] = $r->user;
            }
        }
 		return view('daerah.petugas.index',['staff'=>$staff]);
     }

    public function addDaerah()
    {
        $ranks= Rank::all();
        $states= State::all();
		return view('daerah.petugas.add', compact('states','ranks'));	
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
            'no_badan'=>'required|unique:users',
            'jawatan'=>'required',
            'rank'=>'required',
            'email'=>'required',
            'negeri'=>'required',
            'password' => 'required'
            
            ]);
           
        $user = new User;
        $user->name=(request()->name);
        $user->no_badan=(request()->no_badan);
        $user->jawatan=(request()->jawatan);
        $user->email=(request()->email);
        $user->cawangan=(request()->cawangan);
        $user->rank_id = request()->rank;
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
	    Session::flash('flash_message', 'Profil anggota berjaya dimasukkan!');
        return redirect('senarai_anggota_daerah');
    }

    public function editDaerah(User $petugas)
 	{
 		return view('daerah.petugas.edit',['petugas'=>$petugas]);
    }
     
 	public function updateDaerah(User $petugas,Request $request)
 	{
 		$this->rules['email'].=',email,'.$petugas->email.',email';
    	$this->validate($request,$this->rules);
		$petugas->fill($request->all());
		$petugas->password=bcrypt(request()->password);
		$petugas->save();
    	Session::flash('flash_message', 'Profil anggota berjaya dikemaskini!');
    	return redirect('senarai_anggota_daerah');
     }

    public function deleteDaerah(User $petugas)
    {
        $petugas->delete();
        Session::flash('flash_message', 'Profil anggota berjaya dihapus!');
        return redirect('senarai_anggota_daerah');
    }

}
