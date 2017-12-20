<?php
/**
 * Created by PhpStorm.
 * User: pereiraloann
 * Date: 10/12/2017
 * Time: 15:19
 */
require_once('model/metier/Admin.php');
class AdminGateway
{



    /**
     * @return Connection
     */
    private $con;
    public function getConnect()
    {
        return $this->con;
    }

    public function __construct()
    {
        $this->con=new Connection('mysql:host=localhost;dbname=dblopereira2', 'root', '1234');
    }



    public  function connexionAdmin(string $pseudo,string $mdp)
    {

        $query = "Select * FROM admin Where(pseudo = :login)";
        $this->getConnect()->executeQuery($query, array(
            ':login' => array($pseudo, PDO::PARAM_STR)
        ));
        $resultspseudo =$this->getConnect()->getResults();
        if($resultspseudo==null){
            return FALSE;
        }
        else if(hash("sha1", $resultspseudo[0]['mdp'])==$mdp){
            return TRUE;
        }
        else{

            return FALSE;
        }
    }




}