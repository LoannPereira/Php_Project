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

        $this->routes = [
            'acceuil' => ['ctrl' => 'controller/CtrlUser.php', 'action' => 'voirNews'],
            'connection' => ['ctrl' => 'controller/CtrlUser.php', 'action' => 'connection'],
            'voirSites' => ['ctrl' => 'controller/CtrlAdmin.php', 'action' => 'voirSites','authenticated'=>true],
            'addSites' => ['ctrl' => 'controller/CtrlAdmin.php', 'action' => 'addSites','authenticated'=>true],
            'delSites' => ['ctrl' => 'controller/CtrlAdmin.php', 'action' => 'delSites','authenticated'=>true],
            'deconnexion' => ['ctrl' => 'controller/CtrlAdmin.php', 'action' => 'deconnexion','authenticated'=>true],
            'categ'=>['ctrl' =>'controller/CtrlUser.php','action' =>'getNewsCateg'],
        ];
    }

    public function getRoutes()
    {
        return $this->routes;
    }
}