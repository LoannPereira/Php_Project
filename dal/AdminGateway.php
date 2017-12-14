<?php
/**
 * Created by PhpStorm.
 * User: pereiraloann
 * Date: 10/12/2017
 * Time: 15:19
 */
require_once('../model/metier/Admin.php');
class AdminGateway
{



    /**
     * @return Connection
     */
    public function getConnect()
    {
        return $this->con;
    }
    private $con;
    public function __construct()
    {
        $this->con=new Connection('mysql:host=hostname;dbname=dblopereira2', 'root', '1234');
    }



    public  function connexionAdmin(string $pseudo,string $mdp)
    {

        $query = "Select * FROM admin Where(pseudo=:pseudo)";
        $this->getConnect()->executeQuery($query, array(
            ':pseudo' => array($pseudo, PDO::PARAM_STR)
        ));
        $resultspseudo =$this->getConnect()->getResults();
        foreach ($resultspseudo as $row) {
            if($row['pseudo']==NULL){
                return False;
            }
            else{
                $pseudo=$row['pseudo'];
                $query = "SELECT mdp FROM admin WHERE pseudo LIKE $pseudo ORDER BY pseudo DESC";
                $this->getConnect()->executeQuery($query, array(
                ':mdp' => array($mdp, PDO::PARAM_STR)
            ));
                $resultsmdp =$this->getConnect()->getResults();
                foreach ($resultsmdp as $rowi) {
                    if ($rowi['mdp'] == NULL) {
                        return False;
                    } else {
                        return TRUE;
                    }
                }
            }


        }


    }

    public function voirNews()
    {
        $query = "SELECT * FROM news;";
        $st = $this->getConnect()->executeQuery($query,array());
        $results = $st->fetchall();
        return $results;
    }


}