<html>
<head>
    <title>TopNews</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/acceuilAdminCss.css" rel="stylesheet">
</head>
<body>
<header>
    <h1 id="titre">TopNews</h1>
</header>
<div id="conteneurhaut">
    <div>
    <form action="index.php?action=deconnexion&nbnpage=<?php echo $_REQUEST['nbnpage']?>" method="post">
        <button type="submit"  class="btn btn-primary" id="deconnexion">Déconnexion</button>
    </form>
    </div>

<div class="recherche">
    <nav>
        <p>Rechercher une News</p>
        <form action="index.php?action=ADrecherche" method="post">
            <div class="form-group">
                <input type="text" name="titreRecherche" class="form-control" placeholder="titre de news">
            </div>
            <button type="submit" class="btn btn-primary" id="">Recherche</button>
        </form>
    </nav>
</div>
</div>
<div id="conteneur">
    <div id="categ" >
        <h2>Catégories</h2>
        <div class="list-group" id="licateg">
            <a href="index.php?action=ADcateg&macateg=all" class="list-group-item" id="tout">Tout</a>
            <a href="index.php?action=ADcateg&macateg=Sport" class="list-group-item" >Sport</a>
            <a href="index.php?action=ADcateg&macateg=Tech" class="list-group-item">Tech</a>
            <a href="index.php?action=ADcateg&macateg=Politique" class="list-group-item">Politique</a>
            <a href="index.php?action=ADcateg&macateg=Musique" class="list-group-item">Musique</a>
            <a href="index.php?action=ADcateg&macateg=Jeux-Vidéos" class="list-group-item">Jeux-Vidéos</a>
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
            echo "<h2>Erreur d'appel des News</h2>";
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
<div id="conteneurbas">
    <div id="ajout">
        <form >
            Nouveau flux RSS: <input class="texField" name="flux" value="" type="text">
            <input id="submit" name="submit" class="btn btn-primary" value="Ajouter" type="submit">
        </form>
    </div>
    <div id="nbNews">
        <p  >Nombre de news/page</p>

        <form action="index.php?action=nbnpage"  method="get">
        <select name="nbnpage">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
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
        <button  class="btn btn-primary">Appliquer</button>
        </form>
    </div>
</div>


<footer class="page">
    <nav>
        <ul class="pagination">

            <li>
                <a href="#" aria-label="Previous">
                    <span  aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php
            global $NbNewsParPage;
            global $NbNews;
            if(isset($page)&&isset($NbNews)&&isset($NbNewsParPage)) ;
            for($i=1;$i<=$NbNews/$NbNewsParPage+1;$i++){
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

