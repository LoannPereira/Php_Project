<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formaulaire News</title>


</head>
<body>

<?php
    $titre = $description = $lien = $categorie = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = test_input($_POST["titre"]);
    $description = test_input($_POST["description"]);
    $lien = test_input($_POST["lien"]);
    $categorie = test_input($_POST["categorie"]);
    }
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<form method="post" >
    Titre: <input name="titre" value="" type="text">
    <br><br>
    Description: <input name="description" value="" type="text">
    <br><br>
    Lien: <input name="lien" value="" type="text">
    <br><br>
    Categorie: <input name="categorie" value="" type="text">
    <br><br>
    <input name="submit" value="Submit" type="submit">
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $titre;
echo "<br>";
echo $description;
echo "<br>";
echo $lien  ;
echo "<br>";
echo $categorie;
echo "<br>";
?>
</body>
</html>