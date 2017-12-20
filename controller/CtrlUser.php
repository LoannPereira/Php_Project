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
        global $NbNews, $NbNewsParPage;

        if (isset($_GET['page'])) {
            $page = intval($_GET['page']); // numéro de la page courante
        }
        else $page=1;
        $tabnews=$this->model->voirNews($page);
        $NbNews=$this->model->cptNews();// Nombre de news

        if(isset($_SESSION['role']) && $_SESSION['role']=="admin") require_once ('vues/acceuilAdmin.php');
        else require_once('vues/acceuil.php');

    }

    public function connection()
    {
        $login = Filtrage::cleanString($_POST['pseudo']);
        $mdp = Filtrage::cleanString($_POST['mdp']);
        $_SESSION['login'] = $login;
        $_SESSION['mdp'] = $login;
        try {
            $isadmin = $this->model->connection($login, $mdp);
        } catch (Exception $e) {
            require_once("vues/erreur403.html");// accès refusé
        }
        if (!$isadmin) {
            require_once("vues/erreur403.html");
        } else {
            $_SESSION['role'] = "admin";
            $this->voirNews();
            require_once("vues/acceuilAdmin.php");
        }

    }

    public function getNewsCateg(string $categ){
            if($categ=='all'){
                $this->voirNews();
            }
            else{

                if (isset($_GET['page'])) {
                    $page = intval($_GET['page']); // numéro de la page courante
                }
                else $page=1;
                $tabnews=$this->model->getNewsCateg($categ,$page);

                require_once('vues/acceuil.php');
            }
    }

    public function voirRss(){
        echo 'dsfq';
        require_once ('vues/rss.php');
    }


    public function rechercheNews(){
        if(isset($_POST['titreRecherche'])){
            $titre=$_POST['titreRecherche'];
           $tabnews=$this->model->GetNewsTitre($titre);
            require_once('vues/acceuil.php');
        }
        else{

            echo'aucune news';
        }
    }

}

