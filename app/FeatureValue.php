<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class FeatureValue extends Model
{
    
protected $table = 'feature_values';
protected $fillable = ['feature_id','value_name','status','trash'];

public function Features(){
		return $this->hasOne(\App\Features::class,'id','feature_id');
	}
}
 