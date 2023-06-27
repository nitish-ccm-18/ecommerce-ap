<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Auth;

class AuthController extends Controller
{
    public function login() {
        if(Auth::check())
            return redirect('/');
        return view('auth.login');
    }

    public function authenticate(Request $request ) {
        // validate data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember_me = $request->has('remember_me') ? true : false; 

        
        // Check user type and redirect them as per their type
        if (Auth::attempt($credentials, $remember_me)) {
            $request->session()->regenerate();
 
            if(Auth::user()->type == 'user') {
                Alert('Logged in','You are logged in as a user.');
                return redirect('/users/dashboard');
            }
            else {
                Alert('Logged in','You are logged in as a Vendor.');
                return redirect('/vendor/dashboard');
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
        Alert('Logout Successfully','You are redirecting to Homepage');
        return redirect('/');
    }


    public function sendEmailForm() {
        return view('forgot-password');
    }


    
    public function sendPasswordResetMail(Request $request) {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }
   
}

