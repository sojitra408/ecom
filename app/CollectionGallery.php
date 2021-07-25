<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class CollectionGallery extends Model
{
    
protected $table = 'collection_gallery';
protected $fillable = ['collection_id','image_id'];
}
 