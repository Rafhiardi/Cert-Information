<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
class loginConrtol extends Controller
{
    public function login(Request $request)
    {
        if(Auth::Check()){
            return Redirect('404');
        }
        return view('login');
    }
    public function akseslogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($data)) {
            //dd(Auth::user()->role);
            if (Auth::user()->role == "Admin") {
                return Redirect('/index');
            } elseif (Auth::user()->role == "User") {

                return Redirect('/user/dashboard');
            }
        } else {
            return redirect('/');
        }
    }
    public function Logout(){
        Auth::logout();
        Return Redirect('/');
    }
}
