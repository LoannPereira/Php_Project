<?php
require_once('dal/AdminGateway.php');
require_once('dal/NewsGateway.php');
require_once('metier/Admin.php');
require_once('config/Filtrage.php');
/**
 * Created by PhpStorm.
 * User: clguilbert
 * Date: 09/12/17
 * Time: 10:29
 */
class MdlAdmin
{
    private $gatewayamdin;
    private $gateway;
    public function __construct()
    {
        //session_start();
        $this->gateway=new NewsGateway();
    }
    public function getNewsGateway()
    {
        return $this->gateway;
    }
    public function deconnexion(){
        session_unset();
        session_destroy();
        $_SESSION=array();
    }
    public function voirNews($page){
        $results=$this->getNewsGateway()->voirNews($page);
        $tabnews=[];
        foreach ($results as $row) {
            $tabnews[]=new News($row['titre'],$row['date'],$row['description'],$row['lien'],$row['categorie']);
        }
        return $tabnews;
    }
    public function cptNews(){
        return $this->getNewsGateway()->getNbNews();
    }
    public function getNewsCateg(string $categ,$page){
        $results=$this->gateway->rechercheCateg($categ,$page);
        $tabnews=[];
        foreach ($results as $row) {
            $tabnews[]=new News($row['titre'],$row['date'],$row['description'],$row['lien'],$row['categorie']);
        }
        return $tabnews;
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