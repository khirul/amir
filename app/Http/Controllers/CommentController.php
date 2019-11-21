<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Comment;
use App\Journal;
use Session;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add(Request $request, $id) {
        $this->validate(request(),[
            'comment'=>'required'
            ]);

        $data = $request->all();
    	$comment = new Comment(['comment'=>$data['comment'], 'journal_id'=>$id]);
    	$user = Auth::User();
        $user->Comment()->save($comment);
        Session::flash('flash_message', 'Pandangan/penjelasan berjaya dihantar!');
        return redirect()->back();   
        // return redirect('journal');
    }

    public function destroy($journalId, $commentId) {
        $user = Auth::user();
        $comment = Comment::find($commentId);
        // return $comment;
        if(Auth::User()->id == $comment->user->id) Comment::destroy($commentId);
        return redirect()->route('action', $journalId); 
        // return redirect(route('journal.tindakan', $journalId));
    }
    
    // public function add(Comment $id, Request $request)
    // {
    //     $this->validate(request(),[
    //         'comment'=>'required'  
    //         ]);

    //     $data = $request->all();
    //     $comment = new Comment(['comment'=>$data['comment'], 'journal_id'=>$id]);
    //     $user = Auth::User();
    //     $user->Comment()->save($comment);
    //     Session::flash('flash_message', 'Komen berjaya dimasukkan!');
    //     return redirect('journal');
    // }
}
