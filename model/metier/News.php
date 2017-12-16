<?php

/**
 * Created by PhpStorm.
 * User: clguilbert
 * Date: 18/11/17
 * Time: 11:56
 */
class News
{
    private $titre;
    private $date;
    private $description;
    private $lien;


    public function __get($var)
    {

        if($this->$var!=NULL) {
            return $this->$var;
        }
    }

    public function  __set($prop,$value){
        $this->$prop=$value;
    }



    function __construct(string $titre, string $date, string $description , string $lien, string $categorie){
        $this->titre=$titre;
        $date=new DateTime($date);
        $this->date=$date->format('H:i:s d/m/Y');
        $this->description=$description;
        $this->lien=$lien;
        $this->categorie=$categorie;

    }




    public function disp(){
        print "<br>";
        print $this->titre;
        print "<br>";
        print $this->date->format('Y-m-d H:i:s');;
        print "<br>";
        print $this->description;
        print "<br>";
        print $this->lien;
        print "<br>";
        print $this->categorie;
        print "<br>";
    }
}