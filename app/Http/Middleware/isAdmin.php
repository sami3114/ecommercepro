<?php

namespace App\Http\Middleware;

use Closure;
//use http\Client\Curl\User;
use App\Models\User;
use Illuminate\Http\Request;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user=User::where('usertype','=',1)->first();
        if ($request->user()->usertype === $user->usertype) {
            return $next($request);
        }
        abort(403, "You are not authorized for this action.");
    }
}
