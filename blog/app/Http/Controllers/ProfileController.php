<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function getProfile(Request $request)
    {
        // dd($user);
        return view('profile',  Auth::user());
    }

    public function getEdit()
    {
        return view('edit');
    }

    public function postEdit(Request $request )
    {
        $this ->validate($request, [
            "firstname" => 'min:4|max:50',
            "lastname" => 'min:4|max:50',
            "email"=>'min:4|max:50',
            "phone_number"=>'min:4|max50'
        ]);

        Auth::user()->update([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email'=>$request->input('email'),
        ]);

        return redirect()->route('profile', ['firstname'=>Auth::user()->getName()])->with('info', 'Профиль успешно обновлен');

    }

    public function postUploadAvatar(Request $request)
    {
        $user = Auth::user();

        if ($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(500, 650)->save(public_path($user->getAvatarsPath($user->id)) . $filename);

            // $user = DB::table('users')->where('avatar', $user->id)->update(['avatar'=>$avatar=$filename]);
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return redirect()->route('profile', ["firstname"=>$user->firstname])->with('info', 'Аватар изменён!');
    }
}
