<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Profile;

class ProfileController extends Controller
{
    // Create Profile
    public function create() {

    }
    public function edit() {
        $profile = User::with('profile')->where('id',4)->get();
        return view('profile.edit',['profile'=>$profile]);
    }

    // Update Profile
    public function update(Request $request) {
        $user_id = Auth::id();
        User::where('id',$user_id)->update([
            'name' => $request->name
        ]);
        if($request->file('avatar')) {
            $image = User::find($user_id)->profile->avatar;

            if(file_exists(public_path().'/public/Image/Users/'.$image) && $image){
                unlink(public_path().'/public/Image/Users/'.$image);
            }

            $file= $request->file('avatar');
            $filename= time().$file->getClientOriginalName();
            $file-> move(public_path('public/Image/Users'), $filename);

            Profile::where('user_id',$user_id)->update([
                'gender' => $request->gender,
                'phone' => $request->phone,
                'occupation' => $request->occupation,
                'address' => $request->address,
                'avatar' => $filename
            ]);
        }else {
            Profile::where('user_id',$user_id)->update([
                'gender' => $request->gender,
                'phone' => $request->phone,
                'occupation' => $request->occupation,
                'address' => $request->address,
            ]);
        }

        Alert('Profile Updated','Profile Updated successfully.');
        return back();
    }

    // Show user
    public function show($id) {
        // fetch user profile
        $profile = User::with('profile')->where('id',$id)->get();
        return view('profile.show',['profile'=>$profile]);
    }
}
