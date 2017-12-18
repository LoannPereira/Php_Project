<?php
require_once('dal/NewsGateway.php');
require_once('metier/News.php');
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

    public function voirNews(){
        $results=$this->getGateway()->voirNews();
        $tabnews=[];
        foreach ($results as $row) {
            $tabnews[]=new News($row['titre'],$row['date'],$row['description'],$row['lien'],$row['categorie']);
        }
        return $tabnews;
    }

    public function getNewsCateg(string $categ){
        $results=$this->getGateway()->recherche($categ);
        $tabnews=[];
        foreach ($results as $row) {
            $tabnews[]=new News($row['titre'],$row['date'],$row['description'],$row['lien'],$row['categorie']);
        }
        return $tabnews;
    }



    public function connection($login, $mdp){
        $gate=new AdminGateway();
        $authorize=$gate->connexionAdmin($login,hash("sha1", $mdp));//Variables par défaut, a modifier
        if($authorize==1) return null;
        $_SESSION['login']=$login;

        return new Admin($login,$mdp);
    }

    public function deconnexion()
    {

    }
}