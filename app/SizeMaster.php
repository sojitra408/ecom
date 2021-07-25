<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class SizeMaster extends Model
{
    
protected $table = 'create_master_size';
protected $fillable = ['name','size_category_id','master_size_id','size','brand_size','chest_in','to_fit_waist','inseam_length','outseam_length','to_fit_hip','across_shoulder','sleeve_length','to_fit_foot_length','image','status'];


}
 