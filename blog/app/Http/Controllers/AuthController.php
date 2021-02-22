<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*@mixin Eloquent*/
class AuthController extends Controller
{
    public function getSignup()
    {
        return view('registration');
    }

    public function postSignup(Request $request)
    {
        $this ->validate($request, [
            "firstname" => 'required|min:4|max:50',
            "lastname" => 'required|min:4|max:50',
            "email" => 'required|min:4|max:50',
            'password' => 'required|min:4',
            'passwordagain' => 'required|same:password'
        ]);

        $user = User::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'phone_number'=>$request->input('phone_number'),
            'password' => bcrypt($request->input('password')),
            'sex' => $request->input('sex'),
            'day' => $request->input('day'),
            'month' => $request->input('month'),
            'year' => $request->input('year'),
            ]);

        $user->assignRole('user');

        return redirect()
                    ->route('home')
                    ->with('info', 'Вы успешно зарегестрировались!');
    }

    public function getSignin()
    {
        return view('login');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'email'=>'required|max:225',
            'password'=>'required|min:4'
        ]);

        if(!Auth::attempt($request->only(['email', 'password'])))
        {
            return redirect()->back()->with('info', 'Неправильный логин или пароль!');
        }
        return redirect()->route('home')->with('info', 'Вы успешно вошли!');

    }

    public function getSignout()
    {
        Auth::logout();

        return redirect()->route('home')->with('info', 'Вы вышли со страницы');
    }


}
