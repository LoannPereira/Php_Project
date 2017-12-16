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
    public function __construct()
    {
        $this->model=new Model();


    }

    public function voirNews(){
        $tabnews=$this->model->voirNews();
        require_once('vues/acceuil.php');

    }

    public function connection(){
    $login = Validation::nettoyer_string($_POST['login']);
    $mdp = Validation::nettoyer_string($_POST['mdp']);
    try {
        $admin = $this->model->connexion($login, $mdp); //RECOIT NEW ADMIN
    } catch (Exception $e) {
        require_once ("vues/erreur403.html");// accès refusé
    }
    if ($admin != null) {
        echo "ok";
    } //AFFICHE PAGE ADMIN
    else {
        //ERREUR
    }

}
}

