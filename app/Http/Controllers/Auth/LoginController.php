<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {        
        // if(Auth::user()->attempt(['email' => $request->email, 'password' => $request->password]))
        // {
        //     return redirect()->route('/dashboard');
        // }
        
        if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password]))
        {
            if(Auth::user()->hasRole(1)){
                return redirect()->route('dashboard');
            }
            
            if(Auth::user()->hasRole(2)){
                return redirect()->route('inicio');
            }

        }

    }

    public function logout(Request $request) {
        $this->guard()->logout();

        $request->session()->invalidate();
        return redirect()->route('inicio');
    }
}
