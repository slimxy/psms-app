<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'user';

    
    public function hasRole($role){
        return $this->role === $role;
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'uname',
        'email',
        'password',
        'role',
        'state',
        'station'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

// for  list of users registered by a manager
    public function manager(){
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function staff() {
        return $this->hasMany(User::class,'manager_id');
    }
    // end userlist for manager

// for  showing activity of each user by a manager
    public function userActivities()
    {
        return $this->hasMany(Staff::class,'manager_id');
    }

    // end activities


    // for  list of manager registered by a admin
    public function admin(){
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function managers(){
        return $this->hasMany(User::class, 'admin_id');
    }
// end admin

// for  showing activity of each manager by a admin
public function managerActivities()
{
    return $this->hasMany(Manager::class,'admin_id');
}

// end activities

}
