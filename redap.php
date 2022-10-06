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

        /* De la ligne 31 à la ligne 41, nous trouvons les balises HTML initialisant correctement un tableau HTML avec une ligne d'en-têtes <thead>, afin de bien décomposer les données de chaque produit. */
        echo "<table>",
                "<thead>",
                    "<tr>",
                        "<th>#</th>",
                        "<th>Nom</th>",
                        "<th>Prix</th>",
                        "<th>Quanité</th>",
                        "<th>Total</th>",
                    "</tr>",
            "</table>",
            "<tbody>";
/* La boucle itérative foreach(), particulièrement efficace pour exécuter, produit par produit, les mêmes instructions qui vont permettre l'affichage uniforme de chacun d'entre eux. Pour chaque donnée dans $_SESSION['products'], nous disposerons au sein de la boucle de deux variables :

$index : aura pour valeur l'index du tableau $_SESSION['products'] parcouru. Nous pourrons numéroter ainsi chaque produit avec ce numéro dans le tableau HTML (en première colonne).

$product : cette variable contiendra le produit, sous forme de tableau, tel que l'a créé et stocké en session le fichier traitement.php. */

        foreach($_SESSION["products"] as $index => $product) {
            echo "<tr>",
                "<td>".$index."</td>",
                "<td>".$product["name"]."</td>",
                /* La fonction PHP number_format() permet de modifier l'affichage d'une valeur numérique en précisant plusieurs paramètres. En ajoutant avant la fermeture de la balise <td> un symbole €, nos montants s'affichent en euro */
                "<td>".number_format($product["price"], 2, ",", "&nbsp;")."&nbsp;€</td>",
                "<td>".$product["qtt"]."</td>",
                "<td>".number_format($product["total"], 2, ",", "&nbsp;")."&nbsp;€</td>",
                "</tr>";
        }
        echo "</thody>",
        "</table>";
    }
   ?>

</body>
</html>