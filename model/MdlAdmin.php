<?php
require_once('../dal/AdminGateway.php');
require_once('metier/Admin.php');

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

    public function isAdmin(){
        if (isset($_SESSION['login'])&&isset($_SESSION['role'])){
            $login=Nettoyer::nettoyer_string($_SESSION["login"]);
            $role=Nettoyer::nettoyer_string($_SESSION["role"]);
            return new Admin($login, $role);}
            else return null;
    }

    public function connection(){ //RECOIT DEUX STRINGS LOGIN ET MDP DEPUIS LA VUE acceuil
        //1-NETTOYAGE => retourne deux strings loginPropre et mdpPropre
        $authorize=$this->gateway->authentificate("admin","123");//Variables par défaut, a modifier
        //hash et verify DANS CONTROLLER
        //3 gérer session
    }

    public function deconnexion(){
        session_unset();
        session_destroy();
        $_SESSION=array();
    }
}