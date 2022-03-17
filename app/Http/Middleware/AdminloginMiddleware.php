<?php

namespace App\Http\Middleware;

use App\Models\AdminModel;
use Closure;
use Illuminate\Http\Request;

class AdminloginMiddleware
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
      /*  $user=AdminModel::('username','==','admin')->where('password','==',1234)->get();
        if($request->input('username')==$user->username) {
 }*/

        return $next($request);
    }
}
