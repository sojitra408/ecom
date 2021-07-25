<?php

namespace App\Models\admin;

use App\Models\admin\role;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    protected $table = 'permission';

    public function roles() 
    {

	   return $this->belongsToMany(role::class,'roles_permissions');
	       
	}

	public function admins() 
	{

	   return $this->belongsToMany(Admin::class,'admins_permissions');
	       
	}
}
