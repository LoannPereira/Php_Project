<?php
/**
 * Created by PhpStorm.
 * User: clguilbert
 * Date: 02/12/17
 * Time: 11:38
 */

foreach($tabnews as $new){
    print $new->titre;
    print "<br>";
    print $new->date;
    print "<br>";
    print $new->lien;
    print $new->description;
    print "<br>";
    print $new->categorie;
    print "<br>";
    print "<br>";
}