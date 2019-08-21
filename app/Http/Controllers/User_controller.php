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

    public function store(Request $request)
    {
    	$user = new User();
    	$user->name = $request->user;
    	$user->password = bcrypt($request->pass);
    	$user->email = $request->email;
    	$user->save();
    	$created = "Usuario creado exitosamente";
    	return view('front.index')->with($created,"created");
    }

    public function create()
    {
    	return view('front.signup');
    }
}
