<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class All_Size_Master_Value extends Model
{
    protected $table="all_size_master_value";
    protected $fillable = [
        'all_size_master_id','value_name','status','trash'
    ];

    protected $hidden = [
        
    ];

    public function All_Size_Master(){
		return $this->hasOne(\App\All_Size_Master::class,'id','all_size_master_id');
	}
}
