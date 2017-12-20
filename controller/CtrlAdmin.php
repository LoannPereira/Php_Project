<?php
require_once('model/MdlAdmin.php');
require_once('model/Model.php');
/**
 * Created by PhpStorm.
 * User: clguilbert
 * Date: 25/11/17
 * Time: 11:53
 */

class CtrlAdmin
{

    private $modeladmin;
    private $modeluser;
    private $categ;
    private $tabnews;
    public function __construct()
    {
        $this->modelUser= new Model();
        $this->modeladmin= new MdlAdmin();

    }
    public function voirNews(){
        global $NbNews, $NbNewsParPage;

        if (isset($_GET['page'])) {
            $page = intval($_GET['page']); // numéro de la page courante
        }
        else $page=1;
        $tabnews=$this->modeladmin->voirNews($page);
        $NbNews=$this->modeladmin->cptNews();// Nombre de news

        if(isset($_SESSION['role']) && $_SESSION['role']=="admin") require_once ('vues/acceuilAdmin.php');
        else require_once('vues/acceuil.php');

    }

    public function isAdmin(){
        if (isset($_SESSION['login'])&&isset($_SESSION['role'])){
            $login=Filtrage::cleanString($_SESSION["login"]);
            $role=Filtrage::cleanString($_SESSION["role"]);
            return new Admin($login, $role);}
        else return null;
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
            $tabnews=$this->modeladmin->getNewsCateg($categ,$page);

            require_once('vues/acceuilAdmin.php');
        }
    }
    public function deconnexion()
    {
        $this->modeladmin->deconnexion();
        //echo " mon nbnpage =".$_REQUEST['nbnpage'];
        if(isset($_REQUEST['nbnpage']))
            header('Location: index.php?nbnpage='.$_REQUEST['nbnpage']);
        else
            echo'cc';
            header('Location: index.php?nbnpage=4');
    }

    public function rechercheNews(){
        if(isset($_POST['titreRecherche'])){
            $titre=$_POST['titreRecherche'];
            $tabnews=$this->modelUser->GetNewsTitre($titre);
            require_once('vues/acceuilAdmin.php');
        }
        else{

            echo'aucune news';
        }
    }



}