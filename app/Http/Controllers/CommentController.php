<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Comment;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $comment = new Comment;
        $comment->content = $request->content;
        $comment->post_id = $request->post_id;
        $comment->user_id = auth()->user()->id;
        $comment->save();

        return back();
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
       
       if(Gate::denies('comment-delete', $comment)){
        return back()->with('error', 'Unanthorize');
       }
       
       $comment->delete();
       
        

        return back()->with('info', 'A Comment Deleted!');
    }
}
