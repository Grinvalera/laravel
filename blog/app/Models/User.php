<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use function GuzzleHttp\default_ca_bundle;


class User extends Authenticatable implements HasMedia
{

    use HasRoles;

    use HasMediaTrait;

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone_number',
        'password',
        'sex',
        'day',
        'month',
        'year',
        'status',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getName()
    {
        return "{$this->firstname}";
    }

    public function getNameandLastname()
    {
        if ($this->firstname && $this->lastname)
        {
            return "{$this->firstname} {$this->lastname}";
        }

        if ($this->firstname)
        {
            return "{$this->firstname}";
        }

        return null;
    }

    public function getNameOrEmail()
    {
        return $this->getName() ?: $this->email;
    }

    public function getFirstnameOrEmail()
    {
        return $this->firstname ?: $this->email;
    }

   public function status_check()
   {
       if ($this->status=='ban'){
           return false;
       }
       else{
           return true;
       }
   }

   public function admin_check()
   {
       $admin = $this->getRoleNames()->get(0);
       if($admin == "admin"){
           return true;
       }
       else{
           return false;
       }
   }

   public function getAvatarsPath($user_id)
   {
       $path = "upload/avatars/id{$user_id}";

       if (! file_exists($path))
       {
            mkdir($path, 0777, true);
       }

       return "/{$path}/";
   }
}
