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


    // edit user profile

    //  Show  User Profile
    public function showProfile(Request $request) {
        // Get Current Authenticated User
        $user = Auth::user();

        // pass user to their views
        return view('users.profile',['user'=>$user]);
    }


    // Get Edit Profile Page
    public function editProfilePage() {
        // Get Current Authenticated User
        $user = Auth::user();

        // pass user to their views
        return view('users.edit',['user'=>$user]);
    }

    // handle profile edit
    public function edit(Request $request) {


        $id =Auth::user()->id;
         // Retrieve Current user Image
         $user = User::find($id);
    
        User::where('id',$id)->update([
            'name' => $request->input('name'),
        ]);  
         return redirect('/users/profile');
 
    }
}
