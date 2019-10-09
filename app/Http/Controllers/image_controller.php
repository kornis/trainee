<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\User;

class image_controller extends Controller
{
	 public function update_avatar(Request $request)
    {
    	$user = User::where('email_user',session('user')->email_user)->first();
        $avatar = $request->avatar;
        $path = public_path().'\avatars';  
        $name_avatar = $user->name_user."-".time().".".$avatar->getClientOriginalExtension();
        $avatar->move($path,$name_avatar);
        $user->avatar = $name_avatar;
        $user->save();
       	return view('admin.modify_user')->with('user',$user);;
    }
}
