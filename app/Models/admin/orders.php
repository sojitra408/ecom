<?php



namespace App\Models\admin;



use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

 




class orders extends Model

{

    //

 
 protected $guarded = [];

protected $table='orders';

public function Users(){
		return $this->hasMany(\App\User::class,'id','user_id');
	}
    

}

