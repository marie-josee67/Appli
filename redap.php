<!-- recap.php devra nous permettre d'afficher de manière organisée et exhaustive la liste des 
produits présents en session. Elle doit également présenter le total de l'ensemble de ceux-ci. -->


<?php
    /* A la différence d'index.php, nous aurons besoin ici de parcourir le tableau de session, il est donc nécessaire d'appeler la fonction session_start() en début de fichier afin de récupérer, la session correspondante à l'utilisateur. */
    session_start();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif des produits</title>
</head>
<body>
    
   <?php
   
    /* Nous rajoutons une condition qui vérifie :
    Soit la clé "products" du tableau de session $_SESSION n'existe pas : !isset()
    Soit cette clé existe mais ne contient aucune donnée : empty()*/
    if (!isset($_SESSION[" products "])|| empty ( $_SESSION["products"])){
        echo "<p> Aucun produit en session ...</p>";
    }
    else{

    }

   ?>

</body>
</html>