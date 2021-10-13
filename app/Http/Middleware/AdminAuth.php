<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\Session;


use App\Enums\User\UserRoles;

class AdminAuth{

    public function handle($request, Closure $next){

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == UserRoles::user) {
            return redirect()->route('permission');
        }

        return $next($request);
    }
}
