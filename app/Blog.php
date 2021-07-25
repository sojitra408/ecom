<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class Blog extends Model
{
    
protected $table = 'blog';
protected $fillable = ['id','category_id','slug','subcategory_id','blog_title','tag_ids','status','created_at','featured_image','short_des','description'];
}
 