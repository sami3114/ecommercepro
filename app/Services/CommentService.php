<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentService
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function comment(Request $request){
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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function reply(Request $request){
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
