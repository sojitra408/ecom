<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class AttributeValue extends Model
{
    
protected $table = 'attribute_values';
protected $fillable = ['attribute_id','value_name','color_code','status','trash'];

public function Attributes(){
		return $this->hasOne(\App\Attributes::class,'id','attribute_id');
	}
}
 