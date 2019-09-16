<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\User;

class image_controller extends Controller
{
	 public function update_avatar(Request $request)
    {
    	$id_user = session('name_user');
    	$user = User::where('name_user',$id_user)->first();
        $avatar = $request->avatar;
        $path = public_path().'\avatars';  
        $name_avatar = session('name_user')."-".time().".".$avatar->getClientOriginalExtension();
        $avatar->move($path,$name_avatar);
        $user->avatar = $name_avatar;
        $user->save();
       	return view('admin.user_config')->with('user',$user);;
    }
}
