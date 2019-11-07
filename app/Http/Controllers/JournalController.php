<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Role;
use App\User;
use App\Article;
use App\Comment;
use App\Journal;
use App\Observer;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    // asal without kontinjen
    // public function index()
    // {
    //     $journals = [];
    //     $journalAll = Journal::orderBy('created_at', 'desc')->get();
        
    //     if(Auth::user()->Roles->first()->name == 'kpp' || Auth::user()->Roles->first()->name == 'pp' || Auth::user()->Roles->first()->name == 'admin'){
    //         foreach($journalAll as $j){
    //             if($j->User->category_id == Auth::user()->category_id){
    //                 $journals[]= $j;
    //             }
    //         }
    //     }else{
    //         foreach($journalAll as $j){
    //             if($j->User->subcategory_id == Auth::user()->subcategory_id){
    //                 $journals[]= $j;
    //             }
    //         }
    //     }
    //     $journal_id = [];
    //     $other_journal = [];
    //     $obs = Observer::all();
    //     foreach($obs as $o){
    //         if($o->user_id == Auth::user()->id){
    //             $journal_id[] = $o->journal_id;
    //         }
    //     }
    //     foreach($journal_id as $j){
    //         $k = Journal::find($j);
    //         $other_journal[] = $k;
    //     }
    //     return view('journal.show',['journalRpt'=>$journals,'other_journal'=>$other_journal]);
    // }

    // within kontinjen
    public function index()
    {
        $journals = [];
        $journalAll = Journal::orderBy('created_at', 'desc')->get();
        
        if(Auth::user()->cawangan == 'Bukit Aman'){
            if(Auth::user()->Roles->first()->name == 'kpp' || Auth::user()->Roles->first()->name == 'pp' || Auth::user()->Roles->first()->name == 'admin'){
                foreach($journalAll as $j){
                    // admin ada access smua
                            if($j->User->category_id == Auth::user()->category_id  || Auth::user()->Roles->first()->name == 'admin'){
                        // admin xde access smua
                        // if($j->User->category_id == Auth::user()->category_id){
                            $journals[]= $j;
                        }
                }
            }else{
                foreach($journalAll as $j){
                        if($j->User->subcategory_id == Auth::user()->subcategory_id){
                            $journals[]= $j;
                        }
                }
            }
            $journal_id = [];
            $other_journal = [];
            $obs = Observer::all();
            foreach($obs as $o){
                if($o->user_id == Auth::user()->id){
                    $journal_id[] = $o->journal_id;
                }
            }
            foreach($journal_id as $j){
                $k = Journal::find($j);
                $other_journal[] = $k;
            }
        }elseif(Auth::user()->cawangan == 'Kontinjen'){
            
            if(Auth::user()->Roles->first()->name == 'kck'){
                foreach($journalAll as $j){
                        if($j->User->kontinjen == Auth::user()->kontinjen){
                            $journals[]= $j;
                        }
                }
            }else{
                foreach($journalAll as $j){
                        if($j->User->sub_seccontingent_id == Auth::user()->sub_seccontingent_id){
                            $journals[]= $j;
                        }
                }
            }
            $journal_id = [];
            $other_journal = [];
            $obs = Observer::all();
            foreach($obs as $o){
                if($o->user_id == Auth::user()->id){
                    $journal_id[] = $o->journal_id;
                }
            }
            foreach($journal_id as $j){
                $k = Journal::find($j);
                $other_journal[] = $k;
            }
        }else{
            if(Auth::user()->Roles->first()->name == 'kckd'){
                foreach($journalAll as $j){
                        if($j->User->state_id == Auth::user()->state_id){
                            $journals[]= $j;
                        }
                }
            }else{
                foreach($journalAll as $j){
                        if($j->User->district_id == Auth::user()->district_id){
                            $journals[]= $j;
                        }
                }
            }
            $journal_id = [];
            $other_journal = [];
            $obs = Observer::all();
            foreach($obs as $o){
                if($o->user_id == Auth::user()->id){
                    $journal_id[] = $o->journal_id;
                }
            }
            foreach($journal_id as $j){
                $k = Journal::find($j);
                $other_journal[] = $k;
            }
        }
        
        return view('journal.show',['journalRpt'=>$journals,'other_journal'=>$other_journal]);
    }

    // public function indexPengarah()
    // {
    //     $journalAll = Journal::orderBy('created_at', 'desc')->get();
        
    //     foreach($journalAll as $j){
    //         if($j->User->category_id == Auth::user()->category_id){
    //             $journals[]= $j;
    //             $j = Journal::all();
    //             return $j;
    //         }
    //         return view('journal.show_pengarah',['pengarahRpt'=>$journals]);
    //         }
    //     }

    public function add()
    {
        // penyelia

        $penyelia = [];
        $role = Role::all();
        foreach ($role as $r) {
            if($r->User->cawangan == "Bukit Aman"){
                if($r->name == "pemproses" && $r->User->subcategory_id == Auth::user()->subcategory_id){
                    $penyelia[] = $r->user;
                }
            }elseif($r->User->cawangan == "Kontinjen"){
                if($r->name == "pemproses" && $r->User->sub_seccontingent_id == Auth::user()->sub_seccontingent_id){
                    $penyelia[] = $r->user;
                }
            }else{
                if($r->name == "pemproses" && $r->User->district_id == Auth::user()->district_id){
                    $penyelia[] = $r->user;
                }
            }
        }
        // *********
        return view('journal.form', compact('penyelia'));
        
    }
    
     public function store()
    {   
       
    
        // dd($_POST);
        $this->validate(request(),[
            'tajuk_journal'=>'required',
            'tajuk_artikel'=>'required',
            'artikel'=>'required',
            'tarikh_journal'=>'required',
            'rujukan_fail'=>'required',
            'penyelia'=>'required'
            ]);
           
        $journal = new Journal;
        $journal->tajuk_journal=(request()->tajuk_journal);
        $journal->arahan=(request()->arahan);
        $journal->tajuk_artikel=(request()->tajuk_artikel);
        
        // $journal->artikel=(request()->artikel);
        $journal->tarikh_journal=(request()->tarikh_journal);
        $journal->rujukan_fail=(request()->rujukan_fail);
        $journal->penyelia=(request()->penyelia);
        $journal->tindakan=(request()->tindakan);
        $user = Auth::user();
        if($user->Journal()->save($journal)){
            if (count(request()->artikel) > 0 ){
                foreach( request()->artikel as $index => $artikel ) 
                {
                    $article = new Article;
                    $article->artikel=$artikel;
                    $journal->article()->save($article);
                   
                
                }
            }
        };
        // $journal->save();
	    Session::flash('flash_message', 'Jurnal berjaya dihantar!');
        return redirect('journal');
	     
    }

    public function edit(Journal $journal)
    {
        $staff = User::all();
        $penyelia1 = [];
        foreach($staff as $s){
            if($s->cawangan == "Bukit Aman"){
                if($s->Roles->first()->name == 'pemproses'&& $s->subcategory_id == Auth::user()->subcategory_id){
                    $penyelia1[] = $s;
                }
            }else{
                if($s->Roles->first()->name == 'pemproses'&& $s->sub_seccontingent_id == Auth::user()->sub_seccontingent_id){
                    $penyelia1[] = $s;
                }
            }
            
        }
        return view('journal.edit',['journal'=>$journal,'staff'=>$penyelia1]);
    }
    
    public function updateEdit(Journal $journal, Request $request)
    {
        // dd($_POST);
        $this->validate(request(),
        [   
            'tajuk_journal'=>'required',
            'tajuk_artikel'=>'required',
            'arahan'=>'required',
            'artikel'=>'required',
            'tarikh_journal'=>'required',
            'rujukan_fail'=>'required',
            'penyelia'=>'required'
        ]);

        // method lama x ubah kategori
        // $journal->tajuk_journal = $request->input('tajuk_journal');
        // $journal->arahan = $request->input('arahan');
        // $journal->artikel = $request->input('artikel');
        // $journal->tarikh_journal = $request->input('tarikh_journal');
        // $journal->rujukan_fail = $request->input('rujukan_fail');
        // $journal->penyelia = $request->input('penyelia');
        // $journal->save();
        $journal->fill
        (["tajuk_journal"=>request()->tajuk_journal,
          "arahan"=>request()->arahan,
          "artikel"=>request()->artikel,
          "tarikh_journal"=>request()->tarikh_journal,
          "rujukan_fail"=>request()->rujukan_fail,
          "tindakan"=>null,
          "penyelia"=>request()->penyelia,
        $journal->tajuk_artikel=(request()->tajuk_artikel),
        ]);
        $journal->save();
    	Session::flash('flash_message', 'Jurnal berjaya dikemaskini!');
    	return redirect('journal');    	
    }
    // public function updateEdit(Journal $journal, Request $request)
    // {
    //     // dd($_POST);
    //     $this->validate(request(),
    //     [   
    //         'tajuk_journal'=>'required',
    //         'artikel'=>'required',
    //         'tarikh_journal'=>'required',
    //         'rujukan_fail'=>'required',
    //         'penyelia'=>'required'
    //     ]);

    //     $journal->fill($request->all())->save();
    // 	Session::flash('flash_message', 'Journal berjaya dikemaskini!');
    // 	return redirect('journal');    	
    // }

    // Kategori Tindakan
    public function update(Journal $journal, Request $request)
    {
        // dd($_POST);
        $this->validate(request(),
        [   
            'tajuk_journal'=>'required',
            'artikel'=>'required',
            'tarikh_journal'=>'required',
            'petugas'=>'required'
        ]);

        $journal->fill($request->all())->save();
    	Session::flash('flash_message', 'Kategori Jurnal berjaya dikemaskini!');
    	return redirect('journal');    	
    }

    public function delete(Journal $journal)
    {
    	$journal->delete();
    	Session::flash('flash_message', 'Jurnal berjaya dihapuskan!');

    	return redirect('journal');
    }

// Tindakan penyelia
    public function action(Journal $journal)
    {
        $roles = [];
        $role = Auth::user()->Roles;
        foreach($role as $r){
            $roles[] = $r->name;    
        }

        // $roles = [];
        // $role = Auth::user()->Roles;
        // foreach($role as $r){
        //     if($r->name == "pemproses" && $r->User->cawangan =='Bukit Aman' || $r->name == "pemproses" && $r->User->cawangan =='Kontinjen'){
        //         $roles[] = $r->name;
        //     }
        // }
        $count = Comment::where('journal_id', '=', $journal->id)->count();
        return view('journal.tindakan',['journal'=>$journal,'count'=>$count,'roles'=>$roles]);
    }

    public function tindakan(Journal $journal, Request $request)
    {
        $this->validate(request(),[
            'tindakan'=>'required'
            ]);

        $roles = [];
        $role = Auth::user()->Roles;
        foreach($role as $r){
            $roles[] = $r->name;    
        }

        $journal->fill($request->all())->save();
        Session::flash('flash_message', 'Kategori Tindakan berjaya dihantar!');
        return redirect()->route('action', $journal->id); 
    }

    public function updateAction(Journal $journal, Request $request)
    {
        $this->validate(request(),[
            'tindakan_penyelia'=>'required',
            'tarikh_tindakan'=>'required'
            ]);

        $journal->fill($request->all())->save();
    	Session::flash('flash_message', 'Tindakan berjaya diambil!');
    	return redirect('journal');
    }

    // print function
    public function view(Journal $journal)
    
    {
        return view('journal.view',['journal'=>$journal]);
    }

    public function test_method(){
        return 1;
    }
    
}
