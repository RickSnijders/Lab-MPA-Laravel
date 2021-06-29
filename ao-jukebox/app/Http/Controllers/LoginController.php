<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Auth;

class LoginController extends Controller
{
    //
    function index(){
        return view('login');
    }

    function checklogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        );
        
        if(Auth::attempt($user_data))
        {
            return redirect('/');
        }else{
            return back()->with('error', 'Wrong Login Details');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }

    function register(){
        return view('register');
    }

    function registercheck(Request $request){
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|alphaNum|min:3'
        ]);

        $user = User::create(request(['name', 'email', 'password']));

        Auth::login($user);

        return redirect('/');
    }
}
