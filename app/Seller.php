<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class Seller extends Model
{
    
protected $table = 'seller';
protected $fillable = ['seller_id','seller_name',];

    public function Brand()
    {
        return $this->belongsTo(\App\Brand::class,'seller_id','id');
    }

}
 