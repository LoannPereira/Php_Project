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
<header>
    <h1 id="titre">Top10News(admin)</h1>
    <form id="connexion">
        <div class="form-group">
            <label >Pseudo</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="pseudo">
        </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Mot de passe</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
        </div>
        <button type="submit" class="btn btn-primary">Connexion</button>
    </form>
</header>
<div id="conteneur">
        <div id="categ" >
                <h2>Catégories</h2>
                <div class="list-group" id="licateg">
                    <a href="#" class="list-group-item">Sport</a>
                    <a href="#" class="list-group-item">Tech</a>
                    <a href="#" class="list-group-item">Politique</a>
                    <a href="#" class="list-group-item">Musique</a>
                    <a href="#" class="list-group-item">Jeux-Vidéos</a>
                </div>
        </div>
        <div id="listenews">
            <div>
                <h2>Les News</h2>
            </div>
            
        </div>
        <div id="top">
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
</div>
        
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
            <div id="ajout">
            <form >
            Nouveau flux RSS: <input class="texField" name="flux" value="" type="text">
            <input id="submit" name="submit" value="Ajouter" type="submit">
            </form>
        </div>
<div id="nbNews">
    <p  >Nombre de news/page</p>
    <select>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
    </select>
    <button  type="nbNewspage" class="btn btn-primary">Appliquer</button>
</div>
<footer class="page">

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