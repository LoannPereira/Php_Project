<?php
require_once('/home/etud/clguilbert/public_html/Projet/model/Model.php');
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

        $this->voirNews();
        $model=new Model();
    }

    public function voirNews()
    {

        $tabnews = $this->model->voirNews();
        require_once('../vues/acceuil.php');
    }
    public function connexion()
    {

    }

    public function deconnexion()
    {

    }

}

$ctrlUser=new CtrlUser();