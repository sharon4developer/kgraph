<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function updatePassword($data){
        $user =  User::find(Auth::user()->id);
        $user->password = Hash::make($data->password);
        if($user->save()){
            return true;
        }else{
            return false;
        }
    }
    public static function editDetails($data){
        $user =  User::find($data->user_id);

        $user->name = $data->name;
        $user->email = $data->email;
        if ($data->image) {
            $path = Cms::storeImage($data->image,$data->name);
            $user->image = $path;
        };
        if($user->save()){
            $locationData = getLocationData();
            $user->image = $locationData['storage_server_path'].$locationData['storage_image_path'].$user->image;
            return $user;
        }else{
            return false;
        }
    }
}
