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
    public function __construct()
    {
        $this->model=new Model();


    }

    public function voirNews(){
        if (isset($_GET['page'])) $page = intval($_GET['page']); else $page=1;
        $tabnews=$this->model->voirNews($page);
        $NbNews=$this->model->cptNews();
        $NbNewsParPage=2;
        require_once('vues/acceuil.php');

    }

    public function connection(){
    $login = Filtrage::cleanString($_POST['pseuod']);
    $mdp = Filtrage::cleanString($_POST['mdp']);
    echo 'pseudo communiqué: '.$login;
    echo'<br/>';
    echo 'mdp communiqué: '.$mdp;
        echo'<br/>';
    try {
        $admin = $this->model->connection($login, $mdp); //RECOIT NEW ADMIN
        var_dump($admin);
    } catch (Exception $e) {
        require_once ("vues/erreur403.html");// accès refusé
    }
    if ($admin != null) {
        require_once ("vues/acceuilAdmin.php");
    }
    else {
        echo 'truc';
        require_once ("vues/erreur403.html");
    }

    }
    public function getNewsCateg(string $categ){
            if($categ=='all'){
                $this->voirNews();
            }
            else{
                $tabnews=$this->model->getNewsCateg($categ);
                $link='vues/acceuil.php?categ='.$categ;
                echo $link;
                require_once('/vues/acceuil.php');
            }
    }

}

