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
            'acceuil' => ['ctrl' => 'CtrlUser.php', 'action' => 'voirNews'],
            'connexion' => ['ctrl' => 'CtrlUser.php', 'action' => 'connexion'],
            'voirSites' => ['ctrl' => 'CtrlAdmin.php', 'action' => 'voirSites','authenticated'=>true],
            'addSites' => ['ctrl' => 'CtrlAdmin.php', 'action' => 'addSites','authenticated'=>true],
            'delSites' => ['ctrl' => 'CtrlAdmin.php', 'action' => 'delSites','authenticated'=>true],
            'deconnexion' => ['ctrl' => 'CtrlAdmin.php', 'action' => 'deconnexion','authenticated'=>true]
        ];
    }

    public function getRoutes()
    {
        return $this->routes;
    }
}