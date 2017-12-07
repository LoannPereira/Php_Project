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

    public function __construct()
    {
        $model=new Model();
        $this->acceuil();


    }

    public function acceuil()
    {
        $tabnews = array($this->model->voirNews());
    }
    public function connexion()
    {

    }

    public function deconnexion()
    {

    }



}