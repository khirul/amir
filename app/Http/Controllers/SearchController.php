<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\DamageReport;
use App\Category;
use App\SubCategory;
use App\User;

class SearchController extends Controller
{
    public function index()
    {
        return view('semakan.semak');
    }
 
    public function search(Request $request)
    {
        // $courses = Course::find($request->input('code'));
        // return view('semakan.hasilSemak',['courses'=>$courses]);
        
        $courses = DamageReport::where('code', request()->code)->get();
        return view('semakan.hasilSemak', compact('courses'));
        // return view('semakan.hasilSemak')->with('courses', $courses);
        
    }

    public function print(damageReport $course)
    {
        $staff= User::where('role','petugas')->where('status',1)->get();
        $categories= Category::all();
        $subcategories= SubCategory::all();
        return view('semakan.printResult',['course'=>$course,'staff'=>$staff,'categories'=>$categories,'subcategories'=>$subcategories]);
    }


    // public function print()
    // {
        
    //     return view('semakan.printResult', compact('courses')); 
    // }

}
