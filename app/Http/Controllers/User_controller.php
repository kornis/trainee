<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class User_controller extends Controller
{
    public function index()
    {
    	return view('front.index');
    }

    public function login(Request $request)
    {
        $users_list = User::All();
       
            foreach($users_list as $users)
            {

            if($users->name_user == $request->name)
            {
                session(['name_user'=>$request->name]);

              return redirect()->route('posts');  
            }
             }
                 $user = new User();
                $user->name_user = $request->name;
                $user->password_user = bcrypt("123456");
                $user->email_user = "example@example.com";
                $user->save();
                session(['name_user'=>$request->name]);

                $created = "Usuario creado exitosamente";
                return redirect()->route('posts');
        
    }
        
 


    public function posts()
    {
        return view('front.posts'); 
    }

    public function create()
    {
    	return view('front.signup');
    }

    public function logout()
    {
        session(['user'=>'']);
        return view('front.index');
    }
}
