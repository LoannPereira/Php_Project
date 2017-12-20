<?php
/**
 * Created by PhpStorm.
 * User: Clément
 * Date: 10/12/2017
 * Time: 19:12
 */

class Filtrage
{
    public static function cleanString($text) : string {
        return filter_var($text, FILTER_SANITIZE_STRING);
    }

    public static function cleanMail($mail) : string {
        return filter_var($mail, FILTER_SANITIZE_EMAIL);
    }


    public static function isAlphanumeric($input){
        $regex = '/^[a-z_\-0-9 ,]*$/i';
        if(filter_var($input, FILTER_VALIDATE_REGEXP, array(
            "options" => array("regexp"=>$regex)
        )))
            return true;
        return false;
    }


}