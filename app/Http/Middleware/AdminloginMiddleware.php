<?php

namespace App\Http\Middleware;

use App\Models\AdminModel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //Authentication tanımlanması

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

        if (!Auth::check()){ //kullanıcı girişi yapılmadıysa login sayfasına yönlendirme
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
