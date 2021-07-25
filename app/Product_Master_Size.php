<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Master_Size extends Model
{
    protected $table="product_master_size";
    protected $fillable = [
        'product_id','all_size_master_value_id','chest','front_length','across_shoulder','fit_waist','inseam_length','rise','fit_bust','fit_hip','outseam_length','foot_length','hips','status','trash'
    ];

    protected $hidden = [
        
    ];

   
}
