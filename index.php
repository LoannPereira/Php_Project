<?php
require_once("controller/FrontController.php");
/**
 * Created by PhpStorm.
 * User: clguilbert
 * Date: 16/12/17
 * Time: 10:25
 */

require_once('config/config.php');

require_once('config/Autoloader.php');Autoload::charger();

session_start();

$control=new FrontController();