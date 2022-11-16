<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function add_comment(Request $request){
        if (Auth::id()){
            $comment=new Comment();
            $comment->name=Auth::user()->name;
            $comment->comment=$request->comment;
            $comment->user_id=Auth::user()->id;
            $comment->save();
            return redirect()->back();
        }else
        {
            return redirect('login');
        }
    }
    public function add_reply(Request $request){
        if (Auth::id()){
            $reply=new Reply();
            $reply->name=Auth::user()->name;
            $reply->reply=$request->reply;
            $reply->user_id=Auth::user()->id;
            $reply->comment_id=$request->commentId;
            $reply->save();
            return redirect()->back();
        }else
        {
            return redirect('login');
        }
    }
}
