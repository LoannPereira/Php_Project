<?php
require_once('../model/Model.php');
/**
 * Created by PhpStorm.
 * User: clguilbert
 * Date: 25/11/17
 * Time: 11:53
 */

class CtrlAdmin
{
    public function __construct()
    {

    }

    public function isAdmin(){
        /**if (isset $_SESSION['login"] && isset $_SESSION['role']){
         * $login=Nettoyer::nettoyer_string($_SESSION["login"]);
         * $role=Nettoyer::nettoyer_string($_SESSION["role"]);
         * return new Admin($login, $role)];
         * }
         * else return null;**/
    }

    public function paramList(){
        //Modifie le nombre de news affichés par page
    }

    public function voirSites(){
        //Affiche la liste des sites dont on recoit les flux
    }

    public function addSite(){
        //Ajoute un site à la liste des envoyeurs de news
    }

    public function delSite(){
        //Enleve un site de la liste des envoyeurs de news
    }
}