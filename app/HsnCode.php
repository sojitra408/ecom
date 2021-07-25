<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class HsnCode extends Model
{
    
protected $table = 'hsn_code';
protected $fillable = ['code','description'];
}
 