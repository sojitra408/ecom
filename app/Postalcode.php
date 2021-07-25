<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class Postalcode extends Model
{
    
protected $table = 'postal_code';
protected $fillable = ['id','postalcode','status','postcode_type','created_at'];
}
 