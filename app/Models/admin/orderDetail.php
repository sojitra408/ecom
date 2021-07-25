<?php



namespace App\Models\admin;



use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

 




class orderDetail extends Model

{

    //

 
 protected $guarded = [];

protected $table='order_details';

public function Orders(){
		return $this->hasOne(\App\Models\admin\orders::class,'order_id','order_id');
	}
    

}

