<?php
require_once('../model/Model.php');
/**
 * Created by PhpStorm.
 * User: clguilbert
 * Date: 25/11/17
 * Time: 11:51
 */



class CtrlUser
{

    private $model;
    public function __construct($action)
    {
        $model=new Model();
        $action=Filtrage::cleanString($action);
        switch($action) {
            case NULL:
                $this->$model->voirNews();
                break;

            case "connexion":
                $login=Validation::nettoyer_string($_POST['login']);
                $mdp=Validation::nettoyer_string($_POST['mdp']);
                try {
                    $admin = $this->$model->connexion($login, $mdp); //RECOIT NEW ADMIN
                }
                catch (Exception $e){
                    //Acces refusé
                }
                if($admin!=null){
                    echo "ok";
                } //AFFICHE PAGE ADMIN
                    else{
                    //ERREUR
                    }
                break;

            default:
                //ERREUR
        }
    }






}

