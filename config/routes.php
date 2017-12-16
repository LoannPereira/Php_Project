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
            'acceuil' => ['ctrl' => 'controller/CtrlUser.php', 'action' => 'voirNews'],
            'connexion' => ['ctrl' => 'controller/CtrlUser.php', 'action' => 'connexion'],
            'voirSites' => ['ctrl' => 'controller/CtrlAdmin.php', 'action' => 'voirSites','authenticated'=>true],
            'addSites' => ['ctrl' => 'controller/CtrlAdmin.php', 'action' => 'addSites','authenticated'=>true],
            'delSites' => ['ctrl' => 'controller/CtrlAdmin.php', 'action' => 'delSites','authenticated'=>true],
            'deconnexion' => ['ctrl' => 'controller/CtrlAdmin.php', 'action' => 'deconnexion','authenticated'=>true]
        ];
    }

    public function getRoutes()
    {
        return $this->routes;
    }
}