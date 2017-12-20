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
    private $guid;
    private $categorie;

    /**
     * @return string
     */
    public function getCategorie(): string
    {
        return $this->categorie;
    }

    /**
     * @param string $categorie
     */
    public function setCategorie(string $categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getLien(): string
    {
        return $this->lien;
    }

    /**
     * @param string $lien
     */
    public function setLien(string $lien)
    {
        $this->lien = $lien;
    }

    /**
     * @return string
     */
    public function getGuid(): string
    {
        return $this->guid;
    }

    /**
     * @param string $guid
     */
    public function setGuid(string $guid)
    {
        $this->guid = $guid;
    }

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