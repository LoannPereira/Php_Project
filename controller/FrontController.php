<?php
require("config/routes.php");


/**
 * Created by PhpStorm.
 * User: clguilbert
 * Date: 09/12/17
 * Time: 10:50
 */
class FrontController //NE PASSE PAS DE PARAMETRES
{
    private $routes;
    private $ctrlUser;
    private $ctrlAdmin;
    public function __construct()
    {
        //session_start();
        $listeRoutes = new routes();
        $this->routes = $listeRoutes->getRoutes();


        try {
            if (isset($_REQUEST['action'])) {
                $action = Filtrage::cleanString($_REQUEST['action']);
                if (isset($this->routes[$action])) {
                    if(isset($this->routes[$action]["authenticated"])){
                     //verif auth sino err 403
                    }
                    require_once($this->routes[$action]["ctrl"]);
                    $ctrl=new substr(explode("/",$this->routes[$action]["ctrl"])[1],0,-4);
                    $ctrl->{$this->routes[$action]["action"]}();
                }
            } else {
                require_once("controller/CtrlUser.php");
                $ctrl=new CtrlUser();
                $ctrl->voirNews();
            }


        } catch (Exception $e) {
            //ERREUR 404
        }
    }

}