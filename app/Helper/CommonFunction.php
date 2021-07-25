<?php
namespace App\Helper;
use DB;

class CommonFunction
{   
     // Used to Encrypt ID
    public static function encryptId($id){
        return substr(md5($id), 0, 6).dechex($id);
    }

    public static function createPassword($length){
	  
        $vowels = 'AEIOU';

        $consonants = '0123456789BCDFGHJKLMNPQRSTVWXZ';

        $idnumber = '';

        $alt = time() % 2;

        for ($i = 0;$i < $length;$i++) {

            if ($alt == 1) {

                $idnumber.= $consonants[(rand() % strlen($consonants)) ];

                $alt = 0;

            } else {

                $idnumber.= $vowels[(rand() % strlen($vowels)) ];

                $alt = 1;

            }

        }
        return $idnumber;
	}
    
     
	 
}