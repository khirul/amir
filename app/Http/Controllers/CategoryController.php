<?php

namespace App\Http\Controllers;

use Session;

use App\User;
use App\Category;
use App\Contingent;
use App\Http\Requests;
use App\Seccontingent;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    $categories = category::all();
      return view('category.show',['categories'=>$categories]);
     
  }

  public function add()
    {
    	return view('category.form');
    }
    

  public function store(){
    $this->validate(request(),[
        'category_name'=>'required',
        ]);

        $category=new Category;
        $category->category_name=(request()->category_name);
        $category->save();
       
        Session::flash('flash_message', 'Seksyen berjaya dimasukkan!');
        return redirect('category');
  }

  public function edit(category $category)
    {
    	return view('category.edit',['category'=>$category]);
    }

    public function update(category $category, Request $request)
    {
        $this->validate(request(),
        [   'category_name'=>'required'
        ]);
    	$category->fill($request->all())->save();
    	Session::flash('flash_message', 'Seksyen berjaya dikemaskini!');

    	return redirect('category');	
    }

    public function delete(category $category)
    {
    	$category->delete();
    	Session::flash('flash_message', 'Seksyen berjaya dihapuskan!');

    	return redirect('category');
    }


    // seksyen-kontinjen
    public function indexSeksyenKontinjen()
    {
      $categories = Seccontingent::all();
        return view('categorycontingent.show',['categories'=>$categories]);
    }

  public function addSeksyenKontinjen()
    {
    	return view('categorycontingent.form');
    }

    public function storeSeksyenKontinjen(){
      $this->validate(request(),[
          'section_name'=>'required',
          ]);
  
          $category=new Seccontingent;
          $category->section_name=(request()->section_name);
          $category->save();
         
          Session::flash('flash_message', 'Seksyen berjaya dimasukkan!');
          return redirect('category_kontinjen');
    }

    public function editSeksyenKontinjen(Seccontingent $category)
    {
    	return view('categorycontingent.edit',['category'=>$category]);
    }

    public function updateSeksyenKontinjen(Seccontingent $category, Request $request)
    {
        $this->validate(request(),
        [   'section_name'=>'required'
        ]);
    	$category->fill($request->all())->save();
    	Session::flash('flash_message', 'Seksyen berjaya dikemaskini!');
    	return redirect('category_kontinjen');	
    }

    public function deleteSeksyenKontinjen(Seccontingent $category)
    {
    	$category->delete();
    	Session::flash('flash_message', 'Seksyen berjaya dihapuskan!');

    	return redirect('category_kontinjen');
    }


    // tambah_senarai_kontinjen
    public function indexKontinjenlist()
    {
      $categoriesContingent = Contingent::all();
      
        return view('tambah_kontinjen.show',['categoriesContingent'=>$categoriesContingent]);
      
    }

    public function addKontinjenlist()
    {
    	return view('tambah_kontinjen.form');
    }

    public function storeKontinjenlist(){
      $this->validate(request(),[
          'kontinjen_name'=>'required',
          ]);
  
          $contingent =new Contingent;
          $contingent->kontinjen_name=(request()->kontinjen_name);
          $contingent->save();
         
          Session::flash('flash_message', 'Kontinjen berjaya dimasukkan!');
          // return redirect()->back();
          return redirect('senarai_kontinjen');
    }

    public function editKontinjenlist(Contingent $contingent)
    {
    	return view('tambah_kontinjen.edit',['contingent'=>$contingent]);
    }

    public function updateKontinjenlist(Contingent $contingent, Request $request)
    {

        $this->validate(request(),
        [   'kontinjen_name'=>'required'
        ]);

    	$contingent->fill($request->all())->save();
    	Session::flash('flash_message', 'Kontinjen berjaya dikemaskini!');

    	return redirect('senarai_kontinjen');	
    }

    public function deleteKontinjenlist(Contingent $contingent)
    {
    	$contingent->delete();
    	Session::flash('flash_message', 'Kontinjen berjaya dihapuskan!');

    	return redirect('senarai_kontinjen');
    }

    
}
