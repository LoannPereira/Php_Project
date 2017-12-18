<html>
<head>
   <title>Top10News</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/acceuilAdminCss.css" rel="stylesheet">
    <link href="css/acceuilCss.css" rel="stylesheet">
</head>
<body>
<header>
    <h1 id="titre">Top10News</h1>
    <form action="index.php?action=connection" method="post" id="connexion">
        <div class="form-group">
            <label >Pseudo</label>
            <input type="text" class="form-control" name="pseudo" aria-describedby="emailHelp" placeholder="pseudo">
        </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Mot de passe</label>
            <input type="password" class="form-control" name="mdp" placeholder="Mot de passe">
        </div>
        <button type="submit"  class="btn btn-primary">Connexion</button>
    </form>
</header>
<div id="conteneur">
        <div id="categ" >
                <h2>Catégories</h2>
                <div class="list-group" id="licateg">
                    <a href="index.php?action=categ&macateg=all" class="list-group-item">Tout</a>
                    <a href="index.php?action=categ&macateg=Sport" class="list-group-item" >Sport</a>
                    <a href="index.php?action=categ&macateg=Tech" class="list-group-item">Tech</a>
                    <a href="index.php?action=categ&macateg=Politique" class="list-group-item">Politique</a>
                    <a href="index.php?action=categ&macateg=Musique" class="list-group-item">Musique</a>
                    <a href="index.php?action=categ&macateg=Jeux-Vidéos" class="list-group-item">Jeux-Vidéos</a>

                </div>
        </div>
        <div id="listenews">
            <div>


                <?php
                if (isset($_GET["categ"])) {
                    $categ=$_GET["categ"];
                    echo '<h2>Les News de '; echo $categ; echo'</h2>';
                }
                else{
                    echo'<h2>Les News</h2>';
                }
                ?>
            </div>
            <?php


             if(isset($tabnews)) {
                foreach ($tabnews as $row) {
                    echo '<br><div class="news">';
                    echo '<a href=';echo $row->lien;echo ' class="titreArticle">';echo $row->titre;echo '</a>';
                    echo '<p class="time">'; echo $row->date; echo '</p>';
                    echo '<p class="description">'; echo $row->description; echo '</p>';
                    echo '<p>Lien du site de référencement: '; echo $row->lien; echo '</p>';
                    echo '</div>';
                }
            }else{
                var_dump($tabnews);
                echo "<h2>Erreur d'appel dans la page</h2>";
            }
            ?>
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
                <li><a href="?page=1">1</a></li>
                <li><a href="?page=2">2</a></li>
                <li><a href="?page=3">3</a></li>
                <li><a href="?page=4">4</a></li>
                <li><a href="?page=5">5</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
 
<footer class="page">

</footer>
</body>
</html>

