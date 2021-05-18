<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
use App\Models\companies;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static $rules = [



    ];
    public function registerations()
    {
        return $this->HasMany(registerations::class);
    }

    public function sessions()
    {
        return $this->BelongsToMany(sessions::class,'registerations');
    }

    public function roles(){
        return $this->belongsToMany(\App\Models\Role::class, 'user_roles', 'user_id', 'role_id');
    }

    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach ($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        }else{
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }

    public function hasRole($role){
        if($this->roles()->where('name','=', $role)->first()){
            return true;
        }
        return false;
    }

    public function addRole($role){
        if(Role::whereIn('name', $role)->first()){
            $role =  Role::whereIn('name', $role)->pluck('id');
            $this->roles()->sync($role);
            return true;
        }
        return false;
    }

    public function companies()
    {
        return $this->HasMany(companies::class);
    }
}
