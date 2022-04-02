<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class usersController extends Controller
{
    function insert(Request $request)   // add users controller
    {
         $request->validate([
           'name' => 'required',
           'email' => 'required|email|unique:users',
           'password' => 'required|min:6'
          ]);
         
         $data=$request->all();
         $check= $this->create($data);

         return redirect('/login_success')->with('success','successfully registered');
    }
    function create(array $data)
    {
       return User::create([
        'name'     => $data['name'],
        'email'    => $data['email'],
        'password' => Hash::make($data['password'])
       ]);
    }
    function check_login(Request $request)   // check if logined controller
    {
      $request->validate([
        'email' => 'required',
        'password' => 'required'
       ]);
      
       $data=$request->only('email','password');

       if(Auth::attempt($data))
       {
         return redirect('/login_success');
       }
         return back()->with('error','Wrong Login Details');
    }
    function logout()           // log out controller
    {
      Auth::logout();
      Session::flush();
      return redirect('/');
    }
  
}

