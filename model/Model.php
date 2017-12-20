<?php
require_once('dal/NewsGateway.php');
require_once('model/metier/News.php');
/**
 * Created by PhpStorm.
 * User: clguilbert
 * Date: 02/12/17
 * Time: 10:31
 */
class Model
{
    private $gateway;
    public function __construct()
    {

        $this->gateway=new NewsGateway();

    }


    public function getGateway()
    {
        return $this->gateway;
    }

    public function voirNews($page){
        $results=$this->getGateway()->voirNews($page);
        $tabnews=[];
        foreach ($results as $row) {
            $tabnews[]=new News($row['titre'],$row['date'],$row['description'],$row['lien'],$row['categorie']);
        }
        return $tabnews;
    }

    public function cptNews(){
        return $this->getGateway()->getNbNews();
    }

    public function getNewsCateg(string $categ,$page){
        $results=$this->getGateway()->rechercheCateg($categ,$page);
        $tabnews=[];
        foreach ($results as $row) {
            $tabnews[]=new News($row['titre'],$row['date'],$row['description'],$row['lien'],$row['categorie']);
        }
        return $tabnews;
    }

    public function GetNewsTitre(string $titre){
        $results=$this->getGateway()->rechercheTitre($titre);
        $tabnews=[];
        foreach ($results as $row) {
            $tabnews[]=new News($row['titre'],$row['date'],$row['description'],$row['lien'],$row['categorie']);
        }
        return $tabnews;
    }



    public function connection($login, $mdp){
        $gate=new AdminGateway();
        $authorize=$gate->connexionAdmin($login,hash("sha1", $mdp));//Variables par défaut, a modifier
        if($authorize) return TRUE;
        else return FALSE;

    }
}