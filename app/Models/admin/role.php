<?php

namespace App\Models\admin;

use App\Models\admin\permission;
use App\Models\admin\Admin;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
     protected $table='roles';

    protected $guarded = [];

    public function permissions() {

        return $this->belongsToMany(permission::class,'roles_permissions');
            
     }
     
     public function admins() {
     
        return $this->belongsToMany(Admin::class,'admin_roles');
            
     }
}
