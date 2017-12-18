<?php
require_once('Connection.php');
require_once('model/metier/News.php');
/**
 * Created by PhpStorm.
 * User: clguilbert
 * Date: 18/11/17
 * Time: 11:56
 */
class NewsGateway
{
    /**
     * @return Connection
     */
    public function getCon()
    {
        return $this->con;
    }
    private $con;

    public function __construct()
    {
        $this->con=new Connection('mysql:host=localhost;dbname=clguilbert', 'root', '');

    }

    public function insert(string $titre, DateTime $date, string $description, string $lien, string $categorie){
        $query="INSERT into news VALUES (:date,:titre,:description,:lien,:categorie)";
        $this->getCon()->executeQuery($query, array(
            ':date'=>array($date->format("Y-m-d H:i:s"),PDO::PARAM_STR),
            ':titre'=>array($titre,PDO::PARAM_STR),
            ':description'=>array($description,PDO::PARAM_STR),
            ':lien'=>array($lien, PDO::PARAM_STR),
            ':categorie'=>array($categorie, PDO::PARAM_STR)
        ));
    }

    public function delete(string $titre){
        $query="DELETE FROM news WHERE(titre=:titre)";
        $this->getCon()->executeQuery($query, array(
            ':titre'=>array($titre,PDO::PARAM_STR)
        ));
    }



    public function recherche(string $categ)
    {
        $query = "Select * FROM news Where(categorie=:categ)";
        $this->getCon()->executeQuery($query, array(
            ':categ' => array($categ, PDO::PARAM_STR)
        ));
        $results =$this->getCon()->getResults();
        return $results;

    }

    public function voirNews($page)
    {
        $nbNewsParPage=2;
        $start = abs(($page-1)*$nbNewsParPage);
        $query = "SELECT * FROM news Order by date DESC LIMIT :start,:nbNews;";
        $this->con->executeQuery($query, array(
            ':start' => array($start, PDO::PARAM_INT),
            ':nbNews' => array($nbNewsParPage, PDO::PARAM_INT)
        ));
        $results = $this->getCon()->getResults();

        return $results;
    }

    public function getNbNews(){
        
    }

}
?>