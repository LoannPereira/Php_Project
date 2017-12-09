<?php
require("../config/routes.php");
/**
 * Created by PhpStorm.
 * User: clguilbert
 * Date: 09/12/17
 * Time: 10:50
 */
class FrontController
{
    private $routes;

    public function __construct(){
        session_start();
        $listeRoutes=new routes();
        $routes=$listeRoutes->getRoutes();
    }
}