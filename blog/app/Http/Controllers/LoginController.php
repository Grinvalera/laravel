<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(){
        return view('login');
    }

    public function PostSingin(Request $request){
        $this->validate($request, [
            'email' => 'required|min:4|max:50',
            'password' => 'required',
        ]);

        if(!Auth::attempt($request->only(['email', 'password']))){
            return redirect()->back()->with('info', 'Неправильный логин или пароль!');
        }
        return redirect()->route('/')->with('info', 'Вы успешно зашли на сайт!');
    }



}
