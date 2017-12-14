<?php
require_once('../dal/AdminGateway.php');
require_once('metier/Admin.php');
require_once('../config/Filtrage.php');

/**
 * Created by PhpStorm.
 * User: clguilbert
 * Date: 09/12/17
 * Time: 10:29
 */
class MdlAdmin
{
    private $gateway;

    public function __construct()
    {
        session_start();
        $this->gateway=new AdminGateway();

    }


    public function getGateway()
    {
        return $this->gateway;
    }

    public function isAdmin(){//DEPLACER DANS CONTROLLER
        if (isset($_SESSION['login'])&&isset($_SESSION['role'])){
            $login=Filtrage::cleanString($_SESSION["login"]);
            $role=Filtrage::cleanString($_SESSION["role"]);
            return new Admin($login, $role);}
            else return null;
    }



    public function deconnexion(){
        session_unset();
        session_destroy();
        $_SESSION=array();
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