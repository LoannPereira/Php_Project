<?php
/**
 * Created by PhpStorm.
 * User: Clément
 * Date: 10/12/2017
 * Time: 19:12
 */

class Validation
{
    public static function isMail($input){
        if(filter_var($input, FILTER_VALIDATE_EMAIL)) return true;
        return false;
    }
}