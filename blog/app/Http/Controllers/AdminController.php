<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class AdminController extends Controller
{
    use HasRoles;

    public function allUser()
    {
        $all_user = User::all();
        // dd(User::all()->roles);

        // dd($all_user);
        return view('admin', ['all_user'=>$all_user]);
    }

    public function makeUser(Request $request)
    {

        $user = DB::table('users')->where('id', $request->id)->get();
        // dd($user);
        return view('profile_admin', ["user"=>$user]);

    }

    public function makeAdmin(Request $request)
    {
        $delete_status = DB::table('model_has_roles')->where('model_id', $request->id)->delete();
        $user = User::where('id', $request->id)->first();
        $user->assignRole('admin');
        // $user_get = DB::table('users')->where('id', $request->id)->assignRole('admin');
        // $user_get->assignRole('admin');

        return redirect()->route('admin')->with('info', 'Статус пользователя изменён');

    }

    public function addBan(Request $request)
    {
        $user_get = DB::table('users')->where('id', $request->id)->update(['status'=>'ban']);

        return redirect()->route('admin')->with('info', 'Пользователь забанен');
    }

    public function unban(Request $request)
    {
        $user_get = DB::table('users')->where('id', $request->id)->update(['status'=>'active']);

        return redirect()->route('admin')->with('info', 'Пользователь разбанен');
    }

}
