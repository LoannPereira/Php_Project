<html>
<head>
   <title>TopNews</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/acceuilCss.css" rel="stylesheet">
</head>
<body>
<header>


    <div class="recherche">
    <nav>
        <p>Rechercher une News</p>
        <form action="index.php?action=recherche" method="post">
        <div class="form-group">
            <input type="text" name="titreRecherche" class="form-control" placeholder="titre de news">
        </div>
        <button type="submit" class="btn btn-primary" id="">Recherche</button>
        </form>
    </nav>
    </div>


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
                    <a href="index.php?action=categ&macateg=all" class="list-group-item" id="tout">Tout</a>
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
                <h2>TOP 3</h2>
                <div class="list-group" >
                    <a href="#" class="list-group-item">News 1</a>
                    <a href="#" class="list-group-item">News 2</a>
                    <a href="#" class="list-group-item">News 3</a>

                </div>
        </div>
</div>
<form action="vues/rss.php"  >
    <button type="submit" class="btn btn-primary" >flux rss</button>
</form>
<footer class="page">
    <nav>
        <ul class="pagination">

            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php
            global $NbNews, $NbNewsParPage;
            if(isset($_GET['nbnpage']))
                $NbNewsParPage=intval($_GET['nbnpage']);
            if(isset($page)&&isset($NbNews)&&isset($NbNewsParPage))

            for($i=1; $i<=$NbNews/$NbNewsParPage+$NbNews%$NbNewsParPage; $i++){
                echo "<li><a href=?page=$i&nbnpage=$NbNewsParPage>$i</a></li>";
            }

            ?>

            <li>
                <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</footer>
</body>
</html>

