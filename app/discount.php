<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class discount extends Model
{
    protected $table="discount";
    protected $fillable = [
       'discount_name','product_id','maximum_discount','cat_parent_id','category_id','brand_id','option','minimum_price','discount_percentage','discount_fix','discount_code','description','type','start_date','end_date','showin_list', 'apply_oncart', 'one_time'
    ];

    protected $hidden = [
        
    ];
}
