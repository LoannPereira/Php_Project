<?php
require("config/routes.php");
if(isset($_REQUEST['categ'])){
    $categ = $_GET['categ'];
    require_once("controller/CtrlUser.php");
    $ctrl=new CtrlUser();
    $ctrl->getNewsCateg($categ);
}

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
        $listeroutes = new routes();
        $this->routes = $listeroutes->getRoutes();

        try {

            if (isset($_REQUEST['action'])) {
                //$action = Filtrage::cleanString($_REQUEST['action']); provoque un bug
                $action = $_REQUEST['action'];
                if (isset($this->routes[$action])) {
                    if (isset($this->routes[$action]["authenticated"])) {
                        if ($this->routes[$action]["authenticated"] == true) { //verif auth
                        } else { // sinon erreur 403
                            require_once("vues/erreur403.html");
                        }
                    }
                        if (isset($_REQUEST['macateg'])) {
                            $macateg = $_REQUEST['macateg'];
                            require_once($this->routes[$action]["ctrl"]);
                            $ctrl = new CtrlUser();
                            $ctrl->getNewsCateg($macateg);

                        }
                        else {
                            require_once($this->routes[$action]["ctrl"]);
                            $ctrl = new substr(explode("/", $this->routes[$action]["ctrl"])[1], 0, -4);
                            $ctrl->{$this->routes[$action]["action"]}();
                        }
                }

            } else {
                require_once("controller/CtrlUser.php");
                $ctrl = new CtrlUser();
                $ctrl->voirNews();
             }


        } catch (Exception $e) {
            require_once ("vues/erreur404.html");
        }
    }

}

