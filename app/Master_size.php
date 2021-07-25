<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class Master_size extends Model
{
    
protected $table = 'master_size';
protected $fillable = ['size_category_id','size','brand_size','chest_in','to_fit_waist','inseam_length','outseam_length','to_fit_hip','across_shoulder','sleeve_length','to_fit_foot_length','status','trash',];
}
 