<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class User_controller extends Controller
{
    public function index()
    {
    	return view('front.posts');
    }

    public function login(Request $request)
    {
        $success = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Usuario y/o contraseña erroneos</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';  

        $user = User::where('email_user',$request->email)->first();
      
            if(isset($user))
            {
                if(Hash::check($request->password,$user->password_user))
                {

                    session(['user'=>$user]);
                    return redirect()->route('posts');
                }
                else
                {
                    return view('front.login')->with('success',$success);
                }
            }
            else
                {
                    return view('front.login')->with('success',$success);
                }
        }
        
    public function register(Request $request)
    {
        $user = new User();
        $user->name_user = $request->name;
        $user->email_user = $request->email;
        $user->password_user =  Hash::make($request->password);
        $user->save();
        $success = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Usuario creado exitosamente</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>';
        return view('front.index')->with('success',$success);
    }


    public function posts()
    {
        return view('front.posts'); 
    }

    public function create()
    {
    	return view('front.signup');
    }

    public function profile()
    {
         
        $user = User::where('email_user',session('user')->email_user)->first();
    
        return view('admin.user_config')->with('user',$user);
    }

    public function viewProfiles(Request $request)
    {
                $user = User::where('id_user',$request->id)->first();
    
        return view('front.profiles')->with('user',$user);
    }


    public function logout()
    {
        session(['user'=>'']);
        return view('front.login');
    }
}
