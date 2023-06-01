<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class UserController extends Controller
{

    // Login Page
    public function login() {
        return view('users.login');
    }

    // register
    public function registerPage() {
        return view('users.register');
    }

    // Store
    public function store(Request $request) {
        // validate data
        $request->validate([
            'name' => 'required',
            'email'=> 'required',
            'password' => 'required',
        ]);

        if($request->password == $request->confirm_password) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            return redirect('/login');
        }
        return redirect('/login');
    }

}
