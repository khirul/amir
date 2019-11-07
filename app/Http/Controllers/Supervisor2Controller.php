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
use App\Seccontingent;
use App\SubSeccontingent;
use Illuminate\Http\Request;

class Supervisor2Controller extends Controller
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
        $penyelia_2 = [];
        $role = Role::all();
        foreach ($role as $r) {
            if($r->name == "penyelia" && $r->User->cawangan =='Bukit Aman'){
                $penyelia_2[] = $r->user;
            }
        }
 		return view('penyelia_2.index',['penyelia_2'=>$penyelia_2]);
     }

    public function add()
    {
        $ranks= Rank::all();
        $categories= Category::all();
        return view('penyelia_2.add', compact('categories','ranks'));
    }

    public function store()
    {   
        // dd($_POST);
        $this->validate(request(),[
            'name'=>'required',
            'no_badan'=>'required|unique:users',
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
        $user->email=(request()->email);
        $user->cawangan=(request()->cawangan);
        $user->password=bcrypt(request()->password);
        $user->rank_id = request()->rank;
        $user->status=(request()->status);
    	// $input['status']= 1;
        $user->category_id = request()->category;
        $user->subcategory_id = request()->subcategory_id;
        // dd($_POST);
        if($user->save()){
            $role = new Role;
            $role->name = request()->role;
            $role->user_id = $user->id;
            $role->save();
        }
        Session::flash('flash_message', 'Profil penyelia 2 berjaya dimasukkan!');
        return redirect('senarai_penyelia_2'); 
    }

    public function edit(User $petugas)
 	{
 		return view('penyelia_2.edit',['petugas'=>$petugas]);
    }

    public function update(User $petugas,Request $request)
 	{
 		$this->rules['email'].=',email,'.$petugas->email.',email';
    	$this->validate($request,$this->rules);
		$petugas->fill($request->all());
		$petugas->password=bcrypt(request()->password);
		$petugas->save();
    	Session::flash('flash_message', 'Profil penyelia 2 berjaya dikemaskini!');
    	return redirect('senarai_penyelia_2');
     }

    public function delete(User $petugas)
    {
        $petugas->delete();
        Session::flash('flash_message', 'Profil penyelia 2 berjaya dihapus!');
        return redirect('senarai_penyelia_2');
    }


    // Penyelia 2 Kontinjen
    public function indexKontinjen()
    {
       $penyelia_2 = [];
       $role = Role::all();
       foreach ($role as $r) {
           if($r->name == "penyelia" && $r->User->cawangan =='Kontinjen'){
               $penyelia_2[] = $r->user;
           }
       }
        return view('kontinjen.penyelia_2.index',['penyelia_2'=>$penyelia_2]);
    }

    public function addKontinjen()
    {
        $ranks= Rank::all();
        $categories= Seccontingent::all();
        $contingents= Contingent::all();
        return view('kontinjen.penyelia_2.add', compact('categories','contingents','ranks'));
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
	    Session::flash('flash_message', 'Profil penyelia 2 berjaya dimasukkan!');
        return redirect('senarai_penyelia_2_kontinjen');
    }

    public function editKontinjen(User $petugas)
 	{
 		return view('kontinjen.penyelia_2.edit',['petugas'=>$petugas]);
    }
     
 	public function updateKontinjen(User $petugas,Request $request)
 	{
 		$this->rules['email'].=',email,'.$petugas->email.',email';
    	$this->validate($request,$this->rules);
		$petugas->fill($request->all());
		$petugas->password=bcrypt(request()->password);
		$petugas->save();
    	Session::flash('flash_message', 'Profil penyelia 2 berjaya dikemaskini!');
    	return redirect('senarai_penyelia_2_kontinjen');
     }

    public function deleteKontinjen(User $petugas)
    {
        $petugas->delete();
        Session::flash('flash_message', 'Profil penyelia 2 berjaya dihapus!');
        return redirect('senarai_penyelia_2_kontinjen');
    }


     // Pegawai Tinggi
     public function indexPegawaiTinggi()
     {
        $contingents = Contingent::all();
        $pegawai = [];
        $role = Role::all();
        foreach ($role as $r) {
            if($r->name == "kpp" || $r->name == "pp"){
                $pegawai[] = $r->user;
            }
        }
         return view('pegawai_tinggi.index',['pegawai'=>$pegawai,'contingents'=>$contingents]);
     }

    public function addPegawaiTinggi()
    {
        $ranks= Rank::all();
        $categories= Category::all();
        return view('pegawai_tinggi.add', compact('categories','ranks'));
    }

    public function getSubcategoryPegawaiTinggi($id)
    {
        $subcategory = SubCategory::where("category_id",$id)->get();
        return response()->json($subcategory);
    }

    public function storePegawaiTinggi()
    {   
        // dd($_POST);
        $this->validate(request(),[
            'name'=>'required',
            'no_badan'=>'required|unique:users',
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
    	// $input['status']= 1;
        $user->category_id = request()->category;
        $user->subcategory_id = request()->subcategory_id;
        // dd($_POST);
        if($user->save()){
            $role = new Role;
            $role->name = request()->role;
            $role->user_id = $user->id;
            $role->save();
        }
        Session::flash('flash_message', 'Profil Pegawai Tinggi berjaya dimasukkan!');
        return redirect('senarai_pegawai_tinggi'); 
    }

    public function editPegawaiTinggi(User $pegawai)
    {
        return view('pegawai_tinggi.edit',['pegawai'=>$pegawai]);
    }
    
    public function updatePegawaiTinggi(User $pegawai,Request $request)
    {
        $this->rules['email'].=',email,'.$pegawai->email.',email';
       $this->validate($request,$this->rules);
       $pegawai->fill($request->all());
       $pegawai->password=bcrypt(request()->password);
       $pegawai->save();
       Session::flash('flash_message', 'Profil Pegawai Tinggi berjaya dikemaskini!');
       return redirect('senarai_pegawai_tinggi');
    }

    public function deletePegawaiTinggi(User $pegawai)
    {
        $pegawai->delete();
        Session::flash('flash_message', 'Profil Pegawai Tinggi berjaya dihapus!');
        return redirect('senarai_pegawai_tinggi');
    }




    // pegawai_tinggi-kontinjen
    public function indexPegawaiTinggiKontinjen()
     {
        $pengawai = [];
        $role = Role::all();
        foreach ($role as $r) {
            if(($r->name == "kck"||$r->name == "tkck") && $r->User->cawangan =='Kontinjen'){
                $pengawai[] = $r->user;
            }
        }
         return view('kontinjen.pegawai_tinggi.index',['pengawai'=>$pengawai]);
     }

     public function addPegawaiTinggiKontinjen()
    {
        $ranks= Rank::all();
        $categories= Seccontingent::all();
        $contingents= Contingent::all();
        return view('kontinjen.pegawai_tinggi.add', compact('categories','contingents','ranks'));
    }

    public function storePegawaiTinggiKontinjen()
    {   
        // dd($_POST);
        $this->validate(request(),[
            'name'=>'required',
            'no_badan'=>'required|unique:users',
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
	    Session::flash('flash_message', 'Profil Pegawai Tinggi berjaya dimasukkan!');
        return redirect('senarai_pegawai_tinggi_kontinjen');
    }

    public function editPegawaiTinggiKontinjen(User $petugas)
 	{
 		return view('kontinjen.pegawai_tinggi.edit',['petugas'=>$petugas]);
    }
     
 	public function updatePegawaiTinggiKontinjen(User $petugas,Request $request)
 	{
 		$this->rules['email'].=',email,'.$petugas->email.',email';
    	$this->validate($request,$this->rules);
		$petugas->fill($request->all());
		$petugas->password=bcrypt(request()->password);
		$petugas->save();
    	Session::flash('flash_message', 'Profil Pegawai Tinggi berjaya dikemaskini!');
    	return redirect('senarai_pegawai_tinggi_kontinjen');
     }

    public function deletePegawaiTinggiKontinjen(User $petugas)
    {
        $petugas->delete();
        Session::flash('flash_message', 'Profil Pegawai Tinggi berjaya dihapus!');
        return redirect('senarai_pegawai_tinggi_kontinjen');
    }


    // penyelia 2-daerah
    public function indexDaerah()
 	{
        $penyelia_2 = [];
        $role = Role::all();
        foreach ($role as $r) {
            if($r->name == "penyelia" && $r->User->cawangan =='Daerah'){
                $penyelia_2[] = $r->user;
            }
        }
 		return view('daerah.penyelia_2.index',['penyelia_2'=>$penyelia_2]);
     }

     public function addDaerah()
     {
         $ranks= Rank::all();
         $states= State::all();
         return view('daerah.penyelia_2.add', compact('states','ranks'));
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
         Session::flash('flash_message', 'Profil penyelia 2 berjaya dimasukkan!');
         return redirect('senarai_penyelia_2_daerah');
     }
 
     public function editDaerah(User $petugas)
      {
          return view('daerah.penyelia_2.edit',['petugas'=>$petugas]);
     }
      
      public function updateDaerah(User $petugas,Request $request)
      {
          $this->rules['email'].=',email,'.$petugas->email.',email';
         $this->validate($request,$this->rules);
         $petugas->fill($request->all());
         $petugas->password=bcrypt(request()->password);
         $petugas->save();
         Session::flash('flash_message', 'Profil penyelia 2 berjaya dikemaskini!');
         return redirect('senarai_penyelia_2_daerah');
      }
 
     public function deleteDaerah(User $petugas)
     {
         $petugas->delete();
         Session::flash('flash_message', 'Profil penyelia 2 berjaya dihapus!');
         return redirect('senarai_penyelia_2_daerah');
     }

     

     // pegawai Tinggi-daerah
    public function indexPegawaiTinggiDaerah()
    {
       $pegawai = [];
       $role = Role::all();
       foreach ($role as $r) {
           if($r->name == "kckd" && $r->User->cawangan =='Daerah'){
               $pegawai[] = $r->user;
           }
       }
        return view('daerah.pegawai_tinggi.index',['pegawai'=>$pegawai]);
    }

    public function addPegawaiTinggiDaerah()
    {
        $ranks= Rank::all();
        $states= State::all();
        return view('daerah.pegawai_tinggi.add', compact('states','ranks'));
    }

    public function getSubcategoryPegawaiTinggiDaerah($id)
    {
        $district = District::where("state_id",$id)->get();
        return response()->json($district);
    }

    public function storePegawaiTinggiDaerah()
    {   
        // dd($_POST);
        $this->validate(request(),[
            'name'=>'required',
            'no_badan'=>'required|unique:users',
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
        Session::flash('flash_message', 'Profil Pegawai Tinggi berjaya dimasukkan!');
        return redirect('senarai_pegawai_tinggi_daerah');
    }

    public function editPegawaiTinggiDaerah(User $petugas)
     {
         return view('daerah.pegawai_tinggi.edit',['petugas'=>$petugas]);
    }
     
     public function updatePegawaiTinggiDaerah(User $petugas,Request $request)
     {
         $this->rules['email'].=',email,'.$petugas->email.',email';
        $this->validate($request,$this->rules);
        $petugas->fill($request->all());
        $petugas->password=bcrypt(request()->password);
        $petugas->save();
        Session::flash('flash_message', 'Profil Pegawai Tinggi berjaya dikemaskini!');
        return redirect('senarai_pegawai_tinggi_daerah');
     }

    public function deletePegawaiTinggiDaerah(User $petugas)
    {
        $petugas->delete();
        Session::flash('flash_message', 'Profil Pegawai Tinggi berjaya dihapus!');
        return redirect('senarai_pegawai_tinggi_daerah');
    }


}
