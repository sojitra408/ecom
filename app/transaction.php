<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $table="transaction";
    protected $fillable = [
        'id','order_id','transaction_id','amount','payment_mode','user_id','status','created_at','updated_at'
    ];

    protected $hidden = [
        
    ];
}
