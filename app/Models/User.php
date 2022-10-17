<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = ['name', 'email', 'password','is_admin','active'];

    protected $hidden = ['password', 'remember_token',];

    protected $casts = ['email_verified_at' => 'datetime',];

    // relations start
    public function tasks(){
        return $this->hasMany(Task::class);
    }
    // relations end

    // accessors & Mutator start
    public function setPasswordAttribute($val){
        if (!empty($val)){
            $this->attributes['password'] = bcrypt($val);
        }
    }

    public function setNameAttribute($val)
    {
        $this->attributes['name'] = ucwords($val);
    }

    public function getActive()
    {
        return $this->active == 1 ? 'Active' : 'Inactive';
    }

    public function getIsAdmin()
    {
        return $this->is_admin == 1 ? 'Admin' : 'User';
    }
    // accessors & Mutator end

    //Scopes start
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeIsAdmin($query)
    {
        return $query->where('is_admin', 1);
    }
    //Scopes end
}
