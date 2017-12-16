<?php
require_once('model/MdlAdmin.php');
/**
 * Created by PhpStorm.
 * User: clguilbert
 * Date: 25/11/17
 * Time: 11:53
 */

class CtrlAdmin
{

    private $model;

    public function __construct()
    {

        $model=new MdlAdmin();

        try {

            $action=$_GET['action'];
            $action = Filtrage::cleanString($action);

        switch($action) {
            case NULL:
                $this->$model->voirNews();
                break;



            case "deconnexion":
                $this->$model->deconnexion();
                break;
            case "paramList":
                $this->$model->paramList();
                break;
            case "voirSites":
                $this->$model->voirSites();
                break;
            case "addSites":
                $this->$model->addSites();
                break;
            case "delSites":
                $this->$model->delSites();
                break;
            default:
                //ERREUR action imprévue
                break;
        }
        }
        catch (PDOException $e){
            //ERREUR BDD
        }
        catch (Exception $e2){
            //ERREUR 404
        }
    }




}