<?php
/**
 * Created by PhpStorm.
 * User: lopereira2
 * Date: 08/12/17
 * Time: 19:38
 */
echo '
<html>
<head>
   <title>Top10News</title>
   <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/acceuilAdminCss.css" rel="stylesheet">
</head>
<body>
<header class="box">
    <h1 id="titre">Top10News(admin)</h1>
    <form >
        Pseudo: <input class="texField" name="pseudo" value="" type="text">
        <br /><br />
        Mot de passe: <input class="texField" name="mdp" value="" type="text">
        <br /><br />
        <input id="submit" name="submit" value="Connexion" type="submit">
       </form>
</header>
<div id="conteneur">
<div id="conteneurleft"> 
    <div class="categ" >
            <h2>Catégories</h2>
            <div class="list-group" id="licateg">
                <a href="#" class="list-group-item">Sport</a>
                <a href="#" class="list-group-item">Tech</a>
                <a href="#" class="list-group-item">Politique</a>
                <a href="#" class="list-group-item">Musique</a>
                <a href="#" class="list-group-item">Jeux-Vidéos</a>
            </div>
    </div>
    <div id="ajout">
        <form >
        Nouveau flux RSS: <input class="texField" name="flux" value="" type="text">
        <input id="submit" name="submit" value="Ajouter" type="submit">
        </form>
    </div>
</div>

<div class="listenews">
    <div>
        <h2>Les News</h2>
    </div>
</div>
<aside class="top">
    <div>
        <h2>TOP 10</h2>
        <div class="list-group" >
            <a href="#" class="list-group-item">News</a>
            <a href="#" class="list-group-item">News</a>
            <a href="#" class="list-group-item">News</a>
            <a href="#" class="list-group-item">News</a>
            <a href="#" class="list-group-item">News</a>
            <a href="#" class="list-group-item">News </a>
            <a href="#" class="list-group-item">News</a>
            <a href="#" class="list-group-item">News</a>
            <a href="#" class="list-group-item">News</a>
            <a href="#" class="list-group-item">News</a>
        </div>
    </div>
</aside>
</div>
<footer class="page">
<nav id="page">
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</footer>
</body>
</html>';
/*foreach($tabnews as $new){
print $new->titre;
print "<br />";
print $new->date;
print "<br />";
print $new->lien;
print $new->description;
print "<br />";
print $new->categorie;
print "<br />";
print "<br />";
}

*/