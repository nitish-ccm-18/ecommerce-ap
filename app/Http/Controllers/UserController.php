<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use App\Models\Order;
use App\Models\Profile;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

    // Dashboard page
    public function dashboard() {
        return view('users.dashboard');
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
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            Profile::create([
                'user_id' => $user->id
            ]);
            Alert('User registered','You are redirecting to your dashboard.');
            return redirect('/login'); 
        }
       return back();
    }


    

    //  Show  User Profile
    public function showProfile(Request $request) {
        // Get Current Authenticated User
        $user = User::find(Auth::user()->id);

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

    // edit user profile
    public function edit(Request $request) {
        // Get Current Authenticated User image
        $id =Auth::user()->id;
         $user = User::find($id);
    
        User::where('id',$id)->update([
            'name' => $request->input('name'),
        ]);  
        Alert('Profile Updated','Your profile details are updated successfully.');
         return redirect('/users/profile');
    }

    
    
}
