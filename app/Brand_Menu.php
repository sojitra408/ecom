<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class Brand_Menu extends Model
{
    
protected $table = 'brand_menu';
protected $fillable = ['name','parent_id','select_category','url','urlsecond'];

	public function childs() {
           return $this->hasMany('App\Brand_Menu','parent_id','id') ;
   }
}
 