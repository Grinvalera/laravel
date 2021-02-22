<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function registration(){
        return view('main_page');
    }

    public function check(Request $request){
        $valid = $request->validate([
            "firstname" => 'required|min:4|max:50',
            "lastname" => 'required|min:4|max:50',
            "email" => 'required|min:4|max:50',
            "phone_number"=>'required|numeric|min:5|max:50',
            'password' => 'required',
            'passwordagain' => 'required|same:password'
        ]);

        $user = new User();
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->password = $request->input('password');
        $user->sex = $request->input('sex');
        $user->day = $request->input('day');
        $user->month = $request->input('month');
        $user->year = $request->input('year');

        $user->save();

        return redirect()->route('/login');


    }
}
