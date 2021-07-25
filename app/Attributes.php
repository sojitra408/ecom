<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class Attributes extends Model
{
    
protected $table = 'attributes';
protected $fillable = ['id','attributes_name','thumbnail','banner','status','created_at','updated_at'];
}
 