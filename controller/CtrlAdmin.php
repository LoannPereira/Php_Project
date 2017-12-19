<?php
require_once('model/MdlAdmin.php');
require_once('model/Model.php');
/**
 * Created by PhpStorm.
 * User: clguilbert
 * Date: 25/11/17
 * Time: 11:53
 */

class CtrlAdmin
{

    private $modeladmin;
    private $modeluser;
    private $categ;
    private $tabnews;
    public function __construct()
    {


        $this->modeladmin= new MdlAdmin();

    }
    public function voirNews(){
        if (isset($_GET['ADpage'])) $page = intval($_GET['ADpage']);
        else $page=1;
        $tabnews=$this->modeladmin->voirNews($page);
        $NbNews=$this->modeladmin->cptNews();
        $NbNewsParPage=3;
        var_dump($NbNews);
        require_once('vues/acceuilAdmin.php');

    }


    public function getNewsCateg(string $categ){
        if($categ=='all'){
            $this->voirNews();
        }
        else{
            $tabnews=$this->modeladmin->getNewsCateg($categ);

            require_once('vues/acceuilAdmin.php');
        }
    }




}