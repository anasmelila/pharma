<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function logout()
    {
        auth()->logout(); // Logout the user
        return redirect()->route('login'); // Redirect to login page
    }

    public function doLogin()
    {

        $input=[ 'email'=>request('email'),'password'=>request('password')];

        if(auth()->attempt($input)){
            return redirect()->route('list');
          }
        else{
            return redirect()->route('login')->with('message','Login is Invalid');

        }
    }
}
