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
use Illuminate\Support\Facades\Auth;

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

    // peg ba view bil jurnal anggota
    public function indexBukitKpp()
 	{
        $staff = [];
        $role = Role::all();
        if(Auth::user()->Roles->first()->name == 'kpp' || Auth::user()->Roles->first()->name == 'pp'){
            foreach ($role as $r) {
                if($r->name == "petugas" && $r->User->cawangan =='Bukit Aman' 
                && ($r->User->category_id == Auth::user()->category_id)){
                    $staff[] = $r->user;
                }
            }    
        }elseif(Auth::user()->Roles->first()->name == 'penyelia'){
            foreach ($role as $r) {
                if($r->name == "petugas" && $r->User->cawangan =='Bukit Aman' 
                && ($r->User->subcategory_id == Auth::user()->subcategory_id)){
                    $staff[] = $r->user;
                }
            }    
        }elseif(Auth::user()->Roles->first()->name == 'pemproses'){
            foreach ($role as $r) {
                if($r->name == "petugas" && $r->User->cawangan =='Bukit Aman' 
                && ($r->User->subcategory_id == Auth::user()->subcategory_id)){
                    $staff[] = $r->user;
                }
            }
        }else{
            foreach ($role as $r) {
                if($r->User->id == Auth::user()->id){
                    $staff[] = $r->user;
                }
            }
        }
 		return view('petugas.index_anggota',['staff'=>$staff]);
     }

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
        $ranks= Rank::all();
        $categories= Category::all();
 		return view('petugas.edit',['petugas'=>$petugas,'ranks'=>$ranks,'categories'=>$categories]);
 	}
 	public function update(User $petugas,Request $request)
 	{
        $this->validate(request(),[
            'name'=>'required',
            'rank'=>'required',
            'jawatan'=>'required',
            'email'=>'required',
            'cawangan'=>'required',
            'category'=>'required',
            'password' => 'required'
            
            ]);
            
        $petugas->name=(request()->name);
        $petugas->jawatan=(request()->jawatan);
        $petugas->rank_id = request()->rank;
        $petugas->email=(request()->email);
        $petugas->cawangan=(request()->cawangan);
        $petugas->password=bcrypt(request()->password);
        $petugas->status=(request()->status);
        $petugas->category_id = request()->category;
        $petugas->subcategory_id = request()->subcategory_id;
		$petugas->save();
    	Session::flash('flash_message', 'Profil anggota berjaya dikemaskini!');

        if($petugas->id == Auth::user()->id){
            return redirect('home');
        }else{
            return redirect('senarai_anggota');
        }

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
            'email'=>'required|unique:users',
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

    // peg kontinjen view bil jurnal anggota
    public function indexKontinjenKck()
 	{
        $staff = [];
        $role = Role::all();
        if(Auth::user()->Roles->first()->name == 'kck'){
            foreach ($role as $r) {
                if($r->name == "petugas" && $r->User->cawangan =='Kontinjen' 
                && ($r->User->state_id == Auth::user()->state_id)){
                    $staff[] = $r->user;
                }
            }
        }elseif(Auth::user()->Roles->first()->name == 'penyelia'){
            foreach ($role as $r) {
                if($r->name == "petugas" && $r->User->cawangan =='Kontinjen' 
                && ($r->User->seccontingent_id == Auth::user()->seccontingent_id)){
                    $staff[] = $r->user;
                }
            }    
        }elseif(Auth::user()->Roles->first()->name == 'pemproses'){
            foreach ($role as $r) {
                if($r->name == "petugas" && $r->User->cawangan =='Kontinjen' 
                && ($r->User->seccontingent_id == Auth::user()->seccontingent_id)){
                    $staff[] = $r->user;
                }
            }    
        }else{
            foreach ($role as $r) {
                if($r->User->id == Auth::user()->id){
                    $staff[] = $r->user;
                }
            }
        }
        
 		return view('kontinjen.petugas.index_anggota',['staff'=>$staff]);
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
        $states= State::all();
        $ranks= Rank::all();
        $categories= Seccontingent::all();
        $contingents= Contingent::all();
		return view('kontinjen.petugas.add', compact('categories','contingents','ranks','states'));
    	
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
            'email'=>'required|unique:users',
            'negeri'=>'required',
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
        $user->state_id = request()->negeri;
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
        $states= State::all();
        $ranks= Rank::all();
        $categories= Seccontingent::all();
        $contingents= Contingent::all();
 		return view('kontinjen.petugas.edit',['states'=>$states,'petugas'=>$petugas,'ranks'=>$ranks,'categories'=>$categories,'contingents'=>$contingents]);
    }
     
 	public function updateKontinjen(User $petugas,Request $request)
 	{
        $this->validate(request(),[
            'name'=>'required',
            'jawatan'=>'required',
            'email'=>'required',
            'negeri'=>'required',
            'rank'=>'required',
            'seksyen'=>'required',
            'password' => 'required'
            ]);

        $petugas->name=(request()->name);
        $petugas->jawatan=(request()->jawatan);
        $petugas->email=(request()->email);
        $petugas->cawangan=(request()->cawangan);
        $petugas->kontinjen=(request()->kontinjen);
        $petugas->state_id = request()->negeri;
        $petugas->seccontingent_id = request()->seksyen;
        $petugas->rank_id = request()->rank;
        $petugas->sub_seccontingent_id = request()->subcategorycontingent_id;
        $petugas->password=bcrypt(request()->password);
        $petugas->status=(request()->status);
		$petugas->save();
        Session::flash('flash_message', 'Profil anggota berjaya dikemaskini!');
        if($petugas->id == Auth::user()->id){
            return redirect('home');
        }else{
            return redirect('senarai_anggota_kontinjen');
        }
     }

    public function deleteKontinjen(User $petugas)
    {
        $petugas->delete();
        Session::flash('flash_message', 'Profil anggota berjaya dihapus!');
        return redirect('senarai_anggota_kontinjen');
    }

    // detail jumlah artikel user-kontinjen
    public function detail(User $petugas)
    {
        
        return view('kontinjen.maklumat_penuh',['petugas'=>$petugas]);
    }

    // ***********Finish user anggota kontinjen*********

    

    // peg daerah view bil jurnal anggota
    public function indexDaerahKckd()
 	{
        $staff = [];
        $role = Role::all();
        if(Auth::user()->Roles->first()->name == 'kck'){
            foreach ($role as $r) {
                if($r->name == "petugas" && $r->User->cawangan =='Daerah' 
                && ($r->User->state_id == Auth::user()->state_id)){
                    $staff[] = $r->user;
                }
            }
        }elseif(Auth::user()->Roles->first()->name == 'kckd'){
            foreach ($role as $r) {
                if($r->name == "petugas" && $r->User->cawangan =='Daerah' 
                && ($r->User->district_id == Auth::user()->district_id)){
                    $staff[] = $r->user;
                }
            }
        }elseif(Auth::user()->Roles->first()->name == 'penyelia'){
            foreach ($role as $r) {
                if($r->name == "petugas" && $r->User->cawangan =='Daerah' 
                && ($r->User->district_id == Auth::user()->district_id)){
                    $staff[] = $r->user;
                }
            }
        }elseif(Auth::user()->Roles->first()->name == 'pemproses'){
            foreach ($role as $r) {
                if($r->name == "petugas" && $r->User->cawangan =='Daerah' 
                && ($r->User->district_id == Auth::user()->district_id)){
                    $staff[] = $r->user;
                }
            }
        }else{
            foreach ($role as $r) {
                if($r->User->id == Auth::user()->id){
                    $staff[] = $r->user;
                }
            }
        }
 		return view('daerah.petugas.index_anggota_kckd',['staff'=>$staff]);
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
            'email'=>'required|unique:users',
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
        $ranks= Rank::all();
        $states= State::all();
 		return view('daerah.petugas.edit',['petugas'=>$petugas,'ranks'=>$ranks,'states'=>$states]);
    }
     
 	public function updateDaerah(User $petugas,Request $request)
 	{
        $this->validate(request(),[
            'name'=>'required',
            'jawatan'=>'required',
            'rank'=>'required',
            'email'=>'required',
            'negeri'=>'required',
            'password' => 'required'
            ]);

        $petugas->name=(request()->name);
        $petugas->jawatan=(request()->jawatan);
        $petugas->email=(request()->email);
        $petugas->cawangan=(request()->cawangan);
        $petugas->rank_id = request()->rank;
        $petugas->state_id = request()->negeri;
        $petugas->district_id = request()->daerah;
        $petugas->password=bcrypt(request()->password);
        $petugas->status=(request()->status);
		$petugas->save();
        Session::flash('flash_message', 'Profil anggota berjaya dikemaskini!');
        if($petugas->id == Auth::user()->id){
            return redirect('home');
        }else{
            return redirect('senarai_anggota_daerah');
        }
    	
     }

    public function deleteDaerah(User $petugas)
    {
        $petugas->delete();
        Session::flash('flash_message', 'Profil anggota berjaya dihapus!');
        return redirect('senarai_anggota_daerah');
    }




// utk view index anggota kontinjen pd view peg penyelia kontinjen
    // public function indexKontinjen()
 	// {
    //     $staff = [];
    //     $role = Role::all();
    //     foreach ($role as $r) {
    //         if($r->name == "petugas" && $r->User->cawangan =='Kontinjen' && $r->User->kontinjen == Auth::user()->kontinjen){
    //             $staff[] = $r->user;
    //         }
    //     }
 	// 	return view('kontinjen.petugas.index',['staff'=>$staff]);
    //  }
}
