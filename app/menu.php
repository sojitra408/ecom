<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class menu extends Model
{
    
protected $table = 'menu';
protected $fillable = ['name','url','parent_id','select_category',];

	public function childs() {
           return $this->hasMany('App\menu','parent_id','id') ;
   }
}
 