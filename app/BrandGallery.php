<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class BrandGallery extends Model
{
    
protected $table = 'brand_gallery';
protected $fillable = ['brand_id','image_id'];
}
 