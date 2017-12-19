<?php
require_once('model/Model.php');

/**
 * Created by PhpStorm.
 * User: clguilbert
 * Date: 25/11/17
 * Time: 11:51
 */



class CtrlUser
{

    private $model;
    private $categ;
    private $tabnews;
    public function __construct()
    {
        $this->model=new Model();


    }

    public function voirNews(){
        if (isset($_GET['page'])) $page = intval($_GET['page']);
        else $page=1;
        $tabnews=$this->model->voirNews($page);
        $NbNews=$this->model->cptNews();
        $NbNewsParPage=3;
        require_once('vues/acceuil.php');

    }

    public function connection(){
    $login = Filtrage::cleanString($_POST['pseudo']);
    $mdp = Filtrage::cleanString($_POST['mdp']);
    try {
        $isadmin = $this->model->connection($login, $mdp); //RECOIT NEW ADMIN
    } catch (Exception $e) {
        require_once ("vues/erreur403.html");// accès refusé
    }
    if (!$isadmin) {
        require_once ("vues/erreur403.html");
    }
    else {

        require_once ("vues/acceuilAdmin.php");
    }

    }
    public function getNewsCateg(string $categ){
            if($categ=='all'){
                $this->voirNews();
            }
            else{
                $tabnews=$this->model->getNewsCateg($categ);

                require_once('vues/acceuil.php');
            }
    }

}

