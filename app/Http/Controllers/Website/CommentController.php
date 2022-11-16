<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    /**
     * @param Request $request
     * @param CommentService $commentService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function add_comment(Request $request,CommentService $commentService){
        try {
            return $commentService->comment($request);
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this comments section!';
        }
    }

    /**
     * @param Request $request
     * @param CommentService $commentService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function add_reply(Request $request,CommentService $commentService){
        try {
            return $commentService->reply($request);
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return 'Sorry! Something is wrong with this reply section!';
        }
    }
}
