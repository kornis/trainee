<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;


class User_controller extends Controller
{
 
//pantalla para mostrar la pagina de inicio. 
    public function index()
    {
    	return view('front.posts');
    }


//funcion (api) retorna todos los usuarios

public function api_getUsers()
{
    $users = User::select('id_user','name_user','email_user','ban','type_user')->get();
    if($users)
    {
        
        return response()->json([$users],200);
    }
    else
    {
        return response()->json([
            'message' => 'Page Not Found. If error persists, contact fedegarcia222@gmail.com'], 404);
    }

}


//funcion para iniciar sesion de usuario
    public function login(Request $request)
    {
        $error = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Usuario y/o contraseña erroneos</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';  
        $banned = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Usuario Bloqueado temporalmente...</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        /*$user = User::where('email_user',$request->email)->first();
      
            if(isset($user))
            {
                if($user->ban == 'true')
                {
                    return view('front.login')->with('success',$banned);
                }

                if(Hash::check($request->password,$user->password_user))
                {

                    session(['user'=>$user]);
                    return redirect()->route('posts');
                }
                else
                {
                    return view('front.login')->with('success',$error);
                }
            }
            else
                {
                    
                }*/

                $email = $request->email;
                $password = $request->password;
                $credentials['email_user'] = $request->email;
                $credentials['password'] = $request->password;
                $credentials['ban'] = false;
                if(Auth::attempt($credentials))
                {
                    return redirect()->route('/posts');
                }
                else
                {
                    return view('front.login')->with('success',$error);
                }
        }

        
//funcion para registrar nuevo usuario        
    public function register(Request $request)
    {
        $email = $request->email;
        if(User::where('email_user',$email)->first() != null)
        {
            $error = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>El email ya está en uso</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>';
            return view('front.register')->with('success',$error);
        }
        else
        {
        $user = new User();
        $user->name_user = $request->name;
        $user->email_user = $request->email;
        $user->password_user =  Hash::make($request->password);
        $user->save();
        $success = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Usuario creado exitosamente</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>';
        return view('front.login')->with('success',$success);
    }
    }

//funcion que muestra los posts creados hasta el momento
    public function posts()
    {
        return view('front.posts'); 
    }

    public function create()
    {
    	return view('front.signup');
    }


    //funcion que muestra los datos del usuario logueado
    public function profile()
    {
         
        $user = User::where('email_user',session('user')->email_user)->first();
    
        return view('front.miperfil')->with('user',$user);
    }


    //funcion que muestra datos basicos de cualquier usuario que crea un post o comenta.
    public function viewProfile(Request $request)
    {
        $user = User::where('id_user',$request->id)->first();
        if(!empty($user))
        {
            return view('front.profile')->with('user',$user);    
        }
        
    }

    //funcion que muestra vista para modificar datos de usuario
    public function update_profile($id)
    {
        $user = User::where('id_user',$id)->select('name_user','email_user','avatar','id_user')->first();
        return view('admin.modify_user')->with('user',$user);
    }


    //funcion que guarda los datos de usuario modificados
    public function store_modify(Request $request, $id)
    {
        $user = User::where('id_user',$id)->first();
        if(isset($request->name_user))
        {
            $user->name_user = $request->name_user;    
        }
        
        if(isset($request->password))
        {
            $user->password_user = $request->password_user;
        }
        
        if(isset($request->email->user))
        {
           $user->email_user = $request->email_user;    
        }
        
        $user->save();
        return redirect()->route('update_profile');
    }

    //funcion que muestra vista con todos los usuarios registrados (admin)
    public function admin_user_list()
    {
        $users = User::select('name_user','type_user','email_user','avatar','id_user')->get();
    
        return view('admin.admin_users')->with('users',$users);
    }


    //funcion que muestra el usuario a modificar
    public function admin_user_modify($id)
    {
        $user = User::where('id_user',$id)->first();
    
        return view('admin.admin_modify_user')->with('user',$user);
    }

    //Funcion que guarda datos modificados de un usuario realizados por un admin (admin)
    public function admin_user_modified(Request $request, $id)
    {
        
        $user = User::where('id_user',$id)->select('name_user','email_user','type_user','ban')->first();
        
        if(isset($request->name_user))
        {
            $user->name_user = $request->name_user;
        }
        if(isset($request->email_user))
        {
            $user->email_user = $request->email_user;
        }
        if(isset($request->type_user))
        {
            $user->type_user = $request->type_user;
        }
        if(isset($request->ban))
        {
            $user->ban = $request->ban;
        }
        
       User::where('id_user',$id)->update(['name_user' => $user->name_user,'email_user'=>$user->email_user,'type_user'=>$user->type_user,'ban'=>$user->ban]);

        return redirect()->route('admin_users');
    }

    //funcion para salir de sesion
    public function logout()
    {
        Auth::logout();
        return view('front.login');
    }
}
