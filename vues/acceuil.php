<?php
/**
 * Created by PhpStorm.
 * User: lopereira2
 * Date: 08/12/17
 * Time: 19:38
 */
require_once ("../dal/AdminGateway.php");
$return = FALSE;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["pseudo"]))
        $pseudo = test_input($_POST["pseudo"]);
    if(isset($_POST["mdp"]))
        $mdp = test_input($_POST["mdp"]);
    $gateway= new AdminGateway();
    $return = $gateway->connexionAdmin($pseudo,$mdp);
}



function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = htmlentities($data);
    return $data;
}



echo '
<html>
<head>
   <title>Top10News</title>
   <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/acceuilAdminCss.css" rel="stylesheet">
</head>
<body>
<header>
    <h1 id="titre">Top10News</h1>
    <h1><?php echo "$return";?></h1>
    <form action="acceuil.php" method="post" id="connexion">
        <div class="form-group">
            <label >Pseudo</label>
            <input type="text" class="form-control" name="pseudo" aria-describedby="emailHelp" placeholder="pseudo">
        </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Mot de passe</label>
            <input type="password" class="form-control" name="mdp" placeholder="Mot de passe">
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