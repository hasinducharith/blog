<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


use App\Enums\User\UserRoles;

class LoginController extends Controller
{


    use AuthenticatesUsers;


    //protected $redirectTo = RouteServiceProvider::HOME;

    protected function authenticated(Request $request, $user){
    if ($user->role ==  UserRoles::admin) {
        return redirect()->route('admin.index');
    }

     return redirect('/user');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
