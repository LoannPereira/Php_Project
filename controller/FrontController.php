<?php
require("../config/routes.php");
/**
 * Created by PhpStorm.
 * User: clguilbert
 * Date: 09/12/17
 * Time: 10:50
 */
class FrontController //NE PASSE PAS DE PARAMETRES
{
    private $routes;

    public function __construct()
    {
        session_start();
        $listeRoutes = new routes();
        $this->routes = $listeRoutes->getRoutes();

        try {
            if (isset($_REQUEST['action'])) {
                $action = Filtrage::cleanString($_REQUEST['action']);
            } else {
                //acceuil
            }

            if (isset($this->routes[$_GET[$action]])) {
                $this->routes[$_GET[$action]][$action[1]]();        //PEUT ETRE OU PEUT ETRE PAS
                //COmment verifier les actions et les classes?

            }
        } catch (Exception $e) {
            //ERREUR 404
        }
    }

}