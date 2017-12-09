<?php
require_once('Connection.php');
require_once('../model/metier/Admin.php');
/**
 * Created by PhpStorm.
 * User: clguilbert
 * Date: 09/12/17
 * Time: 10:32
 */
class AdminGateway
{
    public function getCon(): Connection
    {
        return $this->con;
    }
    private $con;

    public function __construct()
    {
        $this->con=new Connection('mysql:host=hina;dbname=dbclguilbert', 'clguilbert', 'clguilbert');
    }

    public function insert(string $login, string $mdp){
        $query="INSERT into admin VALUES (:login,:mdp)";
        $this->getCon()->executeQuery($query, array(
            ':login'=>array($login,PDO::PARAM_STR),
            ':mdp'=>array(password_hash($mdp,PASSWORD_DEFAULT),PDO::PARAM_STR) //Hash a faire dans le controller
        ));
    }

    public function delete(string $login){
        $query="DELETE FROM admin WHERE(login=:login)";
        $this->getCon()->executeQuery($query, array(
            ':login'=>array($login,PDO::PARAM_STR)
        ));
    }

    public function authentificate(string $login, string $mdp){
        $query = "Select * FROM admin Where(login=:login)";
        $this->getCon()->executeQuery($query, array(
            ':login' => array($login, PDO::PARAM_STR)
        ));
        $results =$this->getCon()->getResults();
        if($results==null){
            //ERREUR 403 ACCES FORBIDDEN
            echo "ERROR 403 access forbidden";
            return 1;
        }
        return 0;
    }
}