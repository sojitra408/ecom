<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;
use Session; 
class AdminPermission extends Authenticatable
{
   
 	protected $table = 'admins_permissions';
     
 	protected $fillable = [
        'admin_id', 'permission_id',
    ];


   
}