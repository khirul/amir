<?php

namespace App\Http\Controllers;

use App\Journal;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function view_print(Journal $journal)
    { 
        // using method model binding
        return view('journal.view_print',['journal'=>$journal]);
    }
}
