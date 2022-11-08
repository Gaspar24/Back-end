<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
//    public function index(User $user){
//        return view('pages.profile.profile',[
//            'user'=>$user
//        ]);
//    }
    public function index(){
        return view('pages.profile.profile',[
            'user'=>Auth::user()
        ]);
    }

    public function edit(){
        return view('pages.profile.editProfile');
    }

    public function update(UpdateProfileRequest $request){
        if($request->validated()){
            $args = $request->only(['name']);
            /** @var User $user */
            $user=Auth::user();
            if($request->file('profile_image')){
                $profileImage = $request->file("profile_image");
                $storedImage = $profileImage->storeAs('public/profile_images','profile_image_'.$user->id.".".$profileImage->getClientOriginalExtension());
                $storedImage = str_replace('public','storage',$storedImage);
                $user->profile_image =$storedImage;
            }
            $user->name=$args['name'];
            $user->save();
            return redirect()->back();
        }
    }
}
