<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login() {
        if(Auth::check())
            return redirect('/');
        return view('login');
    }

    public function authenticate(Request $request ) {
        // validate data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Check user type and redirect them as per their type
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            if(Auth::user()->type == 'user') {
                return redirect('/users/dashboard')->with('success','You are logged in as user');
            }
            else {
                return redirect('/vendors/dashboard')->with('success','You are logged in as vendor');
            }
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Handle logout of user(user and vendor both)
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('success','Logout successfully.');
    }
}
