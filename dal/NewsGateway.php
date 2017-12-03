<?php
require_once('../model/metier/Connection.php');
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
    public function getCon(): Connection
    {
        return $this->con;
    }
    private $con;

    public function __construct()
    {
        $this->con=new Connection('mysql:host=hina;dbname=dbclguilbert', 'clguilbert', 'clguilbert');
    }

    public function insert(string $titre, DateTime $date, string $description, string $lien, string $categorie){
        $query="INSERT into news VALUES (:datep,:titre,:description,:lien,:categorie)";
        $this->getCon()->executeQuery($query, array(
            ':datep'=>array($date->format("Y-m-d H:i:s"),PDO::PARAM_STR),
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



    public function recherche(string $titre)
    {
        require_once('News.php');
        $query = "Select * FROM news Where(titre=:titre)";
        $this->getCon()->executeQuery($query, array(
            ':titre' => array($titre, PDO::PARAM_STR)
        ));
        $results =$this->getCon()->getResults();
        foreach ($results as $row) {
            print "<br>";
            print $row['titre'];
            print "<br>";
            print $row['lien'];
            print "<br>";
            print "<br>";
            print "Fin Resultats";

        }

    }

    public function voirNews()
    {
        $query = "SELECT * FROM news;";
        $st = $this->getCon()->executeQuery($query,array());
        $results = $st->fetchall();
        return $results;
    }


}
?>