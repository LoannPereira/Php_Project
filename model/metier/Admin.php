<?php
/**
 * Created by PhpStorm.
 * User: Clément
 * Date: 07/12/2017
 * Time: 21:35
 */

class Admin
{
    private $login;
    private $mdp;
    private $role;

    function __construct(string $login, string $mdp){
        $this->login=$login;
        $this->mdp=$mdp;
        $this->role="admin";
    }
}