<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    protected function redirectTo(){

        if(Auth()->user()->role == "admin")
        {
            return route('isAdmin');
        }
        elseif(Auth()->user()->role == "ketua")
        {
            return route('isKetua');
        }
        elseif(Auth()->user()->role == "kader")
        {
            return route('isKader');
        }
        
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');


        if(auth()->attempt(array('username'=>$username, 'password'=>$password)))
        {
            
            if(auth()->user()->role == "admin")
            {
                return redirect()->route('isAdmin');
            }
            elseif(auth()->user()->role == "ketua")
            {
                return redirect()->route('isKetua');
            }
            elseif(auth()->user()->role == "kader")
            {
                return redirect()->route('isKader');
            }
        }
        else
        {
            return redirect()->route('login')->with('error', 'Username and password are wrong');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
