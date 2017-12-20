<?php

/**
 * Created by PhpStorm.
 * User: lopereira2
 * Date: 22/11/17
 * Time: 17:28
 */
class FluxGateway
{
    private $con;
    public function __construct() {
        $this->con=new Connection('mysql:host=localhost;dbname=dblopereira2', 'root', '1234');

    }

    public function findAll():array
    {

        $this->con->executeQuery('Select * from flux');
        $result=$this->con->getResults();
        $tab = array();
        foreach($result as $row){
            $site=$row['site'];
            $url=$row['url'];
            $tab[]= new Flux($site, $url);
        }
        return $tab;

    }

    public function insert(Flux $nouveau )
    {

        $this->con->executeQuery('Insert into flux values (:site,:url)',
            array(
                ':site' => array($nouveau->getNom(),PDO::PARAM_STR),
                ':url'     => array($nouveau->getUrl(),PDO::PARAM_STR)
            )
        );

    }

    public function delete(string $id)
    {

        $this->con->executeQuery('Delete from flux where site = :site',
            array(
                ':site'=>array($id, PDO::PARAM_STR)
            ));

    }
}