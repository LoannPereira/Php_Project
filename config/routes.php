<?php

/**
 * Created by PhpStorm.
 * User: clguilbert
 * Date: 09/12/17
 * Time: 11:51
 */
class routes
{
    private $routes;

    public function __construct()
    {
        $routes = [
            'acceuil' => ['ctrl' => 'CtrlUser.php', 'action' => 'PageAcceuil'],
            'voirSites' => ['ctrl' => 'CtrlAdmin.php', 'action' => 'ListeSites','authenticated'=>true]
        ];
    }

    public function getRoutes()
    {
        return $this->routes;
    }
}