<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table="users";
    
    protected $fillable = [
            'id','entity','company','turnover','name','email','password','password_val','mobile','otp','brand','website','insta','remember_token','user_ip','created_at','first_name','last_name','gender','dob','profile_pic','city','state','google_authtoken','facebook_authtoken'
    ];

	public function findForPassport($username) {
        return $this->where('username', $username)->first();
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public function authorizeRoles($roles)
	{
	  if ($this->hasAnyRole($roles)) {
		return true;
	  }
	  abort(401, 'This action is unauthorized.');
	}
	public function hasAnyRole($roles)
	{
	  if (is_array($roles)) {
		foreach ($roles as $role) {
		  if ($this->hasRole($role)) {
			return true;
		  }
		}
	  } else {
		if ($this->hasRole($roles)) {
		  return true;
		}
	  }
	  return false;
	}
	public function hasRole($role)
	{
	  if ($this->roles()->where('name', $role)->first()) {
		return true;
	  }
	  return false;
	}
	
	public function UserRole(){
       return $this->hasOne(\App\UserRole::class, 'user_id','id');
    }
}
