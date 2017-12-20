<?php
require_once('Connection.php');
require_once(__DIR__.'/../model/metier/News.php');
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
        $this->con=new Connection('mysql:host=localhost;dbname=dblopereira2', 'root', '1234');

    }

    public function insert(string $titre, DateTime $date, string $description, string $lien, string $categorie,string $flux, string $guid){
        $query="INSERT into mesnews VALUES (:date,:titre,:description,:lien,:categorie,:flux, :guid)";
        $this->getCon()->executeQuery($query, array(
            ':date'=>array($date->format("Y-m-d H:i:s"),PDO::PARAM_STR),
            ':titre'=>array($titre,PDO::PARAM_STR),
            ':description'=>array($description,PDO::PARAM_STR),
            ':lien'=>array($lien, PDO::PARAM_STR),
            ':categorie'=>array($categorie, PDO::PARAM_STR),
            ':flux'=>array($flux, PDO::PARAM_STR),
            ':guid'=>array($guid, PDO::PARAM_STR)

        ));
    }

    public function delete(string $titre){
        $query="DELETE FROM mesnews WHERE(titre=:titre)";
        $this->getCon()->executeQuery($query, array(
            ':titre'=>array($titre,PDO::PARAM_STR)
        ));
    }



    public function rechercheCateg(string $categ,$page)
    {
        global $NbNewsParPage;
        if ($NbNewsParPage==0 && isset($_GET['nbnpage']))
            $NbNewsParPage = intval($_GET['nbnpage']);
        else if($NbNewsParPage==0)
            $NbNewsParPage=4; // nombre de news par page par défaut
        $start = abs(($page-1)*$NbNewsParPage);
        $query = "Select * FROM mesnews Where(categorie=:categ) Order by date DESC LIMIT :start,:nbNews;";

        $this->con->executeQuery($query, array(
            ':categ'=> array($categ,PDO::PARAM_INT),
            ':start' => array($start, PDO::PARAM_INT),
            ':nbNews' => array($NbNewsParPage, PDO::PARAM_INT)
        ));
        $results = $this->getCon()->getResults();

        return $results;

    }

    public function rechercheTitre(string $titre)
    {
        $query = "Select * FROM mesnews Where(titre=:titre)";
        $this->getCon()->executeQuery($query, array(
            ':titre' => array($titre, PDO::PARAM_STR)
        ));
        $results =$this->getCon()->getResults();
        return $results;

    }

    public function voirNews($page)
    {
        global $NbNewsParPage;
        if ($NbNewsParPage==0 && isset($_GET['nbnpage']))
            $NbNewsParPage = intval($_GET['nbnpage']);
        else if($NbNewsParPage==0)
            $NbNewsParPage=4; // nombre de news par page par défaut
        $start = abs(($page-1)*$NbNewsParPage);
        $query = "SELECT * FROM mesnews Order by date DESC LIMIT :start,:nbNews;";
        $this->con->executeQuery($query, array(
            ':start' => array($start, PDO::PARAM_INT),
            ':nbNews' => array($NbNewsParPage, PDO::PARAM_INT)
        ));
        $results = $this->getCon()->getResults();

        return $results;
    }

    public function getNbNews(){
        $query="SELECT COUNT(*) FROM mesnews";
        $this->con->executeQuery($query);
        return $this->getCon()->getResult()['COUNT(*)'];
    }

}
?>