<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class Contact extends Model
{
    
protected $table = 'contact';
protected $fillable = ['title','title2','address','phone','phone2','time','link',];
}
 