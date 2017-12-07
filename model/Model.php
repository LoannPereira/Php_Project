<?php
require_once('../dal/NewsGateway.php');
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
}