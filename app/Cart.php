<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  protected $table = 'carts';
protected $fillable = ['cart_uuid','total_qty','total_price'];
}
