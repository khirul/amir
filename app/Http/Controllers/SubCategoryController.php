<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use App\Category;
use App\SubCategory;
use App\Http\Requests;
use App\Seccontingent;
use App\SubSeccontingent;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    $subcategories = SubCategory::all();
    
      return view('subcategory.show',['subcategories'=>$subcategories]);
  }

  public function add()
  {
      
      $categories= Category::all();
      return view('subcategory.form',['categories'=>$categories]);
  }

  public function store(){

    $this->validate(request(),[
        'subcategory_name'=>'required',
        ]);

        $subcategory=new SubCategory;
        $subcategory->subcategory_name=(request()->subcategory_name);
        $subcategory->category_id = request()->category;
        $subcategory->save();
       
        Session::flash('flash_message', 'Subseksyen berjaya dimasukkan!');
        return redirect('subcategory');
  }

  public function edit(subcategory $subcategory)
    {
    	return view('subcategory.edit',['subcategory'=>$subcategory]);
    }

    public function update(subcategory $subcategory, Request $request)
    {
        // $this->rules['code'].=',code,'.$course->code.',code';

        $this->validate(request(),
        [   'subcategory_name'=>'required'
        ]);
    	// dd($this->rules);
    	// $this->validate($request,$this->rules);

    	$subcategory->fill($request->all())->save();
    	Session::flash('flash_message', 'Subseksyen berjaya dikemaskini!');

    	return redirect('subcategory');	
    }

    public function delete(subcategory $subcategory)
    {
    	$subcategory->delete();
    	Session::flash('flash_message', 'Subseksyen berjaya dihapuskan!');

    	return redirect('subcategory');
    }


    // subcategory_kontinjen
    public function indexSubSeksyenKontinjen()
    {
      $subcategories = SubSeccontingent::all();
        return view('subcategorycontingent.show',['subcategories'=>$subcategories]);
    }
  
    public function addSubSeksyenKontinjen()
    {
        $categories= Seccontingent::all();
        return view('subcategorycontingent.form',['categories'=>$categories]);
    }
  
    public function storeSubSeksyenKontinjen(){

      $this->validate(request(),[
          'subsection_name'=>'required',
          ]);
  
          $subcategory=new SubSeccontingent;
          $subcategory->subsection_name=(request()->subsection_name);
          $subcategory->seccontingent_id = request()->section_name;
          $subcategory->save();
         
          Session::flash('flash_message', 'Subseksyen berjaya dimasukkan!');
          return redirect('subcategory_kontinjen');
    }

    public function editSubSeksyenKontinjen(SubSeccontingent $subcategory)
    {
    	return view('subcategorycontingent.edit',['subcategory'=>$subcategory]);
    }

    public function updateSubSeksyenKontinjen(SubSeccontingent $subcategory, Request $request)
    {
        $this->validate(request(),
        [   'subsection_name'=>'required'
        ]);

    	$subcategory->fill($request->all())->save();
    	Session::flash('flash_message', 'Subseksyen berjaya dikemaskini!');

    	return redirect('subcategory_kontinjen');	
    }

    public function deleteSubSeksyenKontinjen(SubSeccontingent $subcategory)
    {
    	$subcategory->delete();
    	Session::flash('flash_message', 'Subseksyen berjaya dihapuskan!');

    	return redirect('subcategory_kontinjen');
    }
}
