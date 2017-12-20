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


        $this->modeladmin= new MdlAdmin();

    }
    public function voirNews(){
        if (isset($_GET['page'])) $page = intval($_GET['page']);
        else $page=1;
        $tabnews=$this->modeladmin->voirNews($page);
        $NbNews=$this->modeladmin->cptNews();

        require_once('vues/acceuilAdmin.php');

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
            $tabnews=$this->modeladmin->getNewsCateg($categ);

            require_once('vues/acceuilAdmin.php');
        }
    }
    public function deconnexion()
    {
        $this->modeladmin->deconnexion();
        header('Location: index.php?page=1');
    }



}