<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shipping extends Model
{
    protected $table="shipping";
    protected $fillable = [
        'title', 'price','description','cart_price','type'
    ];

    protected $hidden = [
        
    ];
}
