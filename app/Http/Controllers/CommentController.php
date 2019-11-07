<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Comment;
use App\Journal;
use Session;

class CommentController extends Controller
{

    public function add(Request $request, $id) {
        $data = $request->all();
    	$comment = new Comment(['comment'=>$data['comment'], 'journal_id'=>$id]);
    	$user = Auth::User();
        $user->Comment()->save($comment);
        Session::flash('flash_message', 'Pandangan/penjelasan berjaya dihantar!');
        return redirect()->back();   
        // return redirect('journal');
    }

    // public function destroy($articleId, $commentId) {
    //     $user = Auth::user();
    //     if($user->admin) Comment::destroy($commentId);
    //     return redirect(route('journal.tindakan', $articleId));
    // }
    
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
