<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class Related_products extends Model
{
    
protected $table = 'related_products';
protected $fillable = ['product_id','related_products_id',];
}
 