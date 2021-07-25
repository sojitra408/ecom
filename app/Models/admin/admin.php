<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\admin\role;
use App\Permissions\HasPermissionsTrait;

class Admin extends Authenticatable
{
    use Notifiable,HasPermissionsTrait;
    
    public function roles()
    {
        return $this->belongsToMany('App\Models\admin\role');
    }

    public function getNameAttribute($value)
        {
            return ucfirst($value);
        }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
