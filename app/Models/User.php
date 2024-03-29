<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
use App\Models\companies;
use App\Models\registerations;
use App\Notifications\PasswordReset;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
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
        'name' => 'required|max:10',
        'email' => 'required|string|email|max:255|unique:users',

    ];
    public function registerations()
    {
        return $this->HasMany(registerations::class, 'user_id');
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
        return $this->hasOne(companies::class,'user_id');

    }
    // this is the recommended way for declaring event handlers
    public static function boot() {
        parent::boot();
        static::deleting(function($user) { // before delete() method call this
            $user->roles()->detach();
       });
    }

    public function notif()
    { 
        if(Auth::check()){
            if($this->hasRole('user'))
                return $this->registerations()->where('notif',1)->count();
            elseif($this->hasRole('company')){
            return registerations::where('notifcompany',1)->with('user')->with(['sessions', 'sessions.courses'])->whereHas('sessions.courses', function ($query) {
                $query->where('company_id',$this->companies->id);
                })->count();
            }else{
                return registerations::where('notifcompany',1)->with('user')->with(['sessions', 'sessions.courses'])->whereHas('sessions.courses', function ($query) {
                    
                    })->count();
            }
        }else{
            return abort(404);
        }    
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordReset($token));
    }
}
