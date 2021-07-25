<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class Reviews extends Model
{
    
protected $table = 'reviews';
protected $fillable = ['product_id','review_title','review_description','rating','image','status'];
}
 