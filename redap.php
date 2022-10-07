<!--  Affichera tous les produits en session (et en détail) et présentera le total général de tous les produits ajoutés.-->


<?php
    /* A la différence d'index.php, nous aurons besoin ici de parcourir le tableau de session, il est donc nécessaire d'appeler la fonction session_start() en début de fichier afin de récupérer, la session correspondante à l'utilisateur. */
    session_start();
     /*var_dump($_SESSION);
     die;  arrête le programme*/

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Récapitulatif des produits</title>
</head>
<body>
     <!-- liens entre deux page php -->
    <a href="index.php"></a>
    <div id ="recapitulatif">
        <?php
            /* Vérification du tableau qu'il contien bien des informations  =>  <?php var_dump($_SESSION); ?> */

            /* Nous rajoutons une condition qui vérifie :
            Soit la clé "products" du tableau de session $_SESSION n'existe pas : !isset()
            Soit cette clé existe mais ne contient aucune donnée : empty()*/
            if (!isset($_SESSION["products"])|| empty ( $_SESSION["products"])){
                echo "<p> Aucun produit en session ...</p>";
            }
            else{ 

                /* De la ligne 30 à la ligne 40, nous trouvons les balises HTML initialisant correctement un tableau HTML avec une ligne d'en-têtes <thead>, afin de bien décomposer les données de chaque produit. */
                echo "<table id ='table'>",
                        "<thead>",
                            "<tr id ='tableau'>",
                                "<th>#</th>",
                                "<th>Nom</th>",
                                "<th>Prix</th>",
                                "<th>Quantité</th>",
                                "<th>Total</th>",
                            "</tr>",
                        "</thead>",
                        
                        "<tbody>";
                        
                        /*session_destroy(); /*enlève tous se qui est stocker en session peut être mis n'importe ou sauf dans une boucle ou fonction*/

                /* Dans un premier temps, avant la boucle, on initialise une nouvelle variable $totalGeneral à zéro. */
                $totalGeneral = 0;

                /* La boucle itérative foreach(), particulièrement efficace pour exécuter, produit par produit, les mêmes instructions qui vont permettre l'affichage uniforme de chacun d'entre eux. Pour chaque donnée dans $_SESSION['products'], nous disposerons au sein de la boucle de deux variables :

                $index : aura pour valeur l'index du tableau $_SESSION['products'] parcouru. Nous pourrons numéroter ainsi chaque produit avec ce numéro dans le tableau HTML (en première colonne).

                $product : cette variable contiendra le produit, sous forme de tableau, tel que l'a créé et stocké en session le fichier traitement.php. */

                foreach($_SESSION["products"] as $index => $product) {
                    echo "<tr class='foreach'>",
                            "<td>".$index."</td>",
                            "<td class='designation'>".$product["name"]."</td>",
                            /* La fonction PHP number_format() permet de modifier l'affichage d'une valeur numérique en précisant plusieurs paramètres. En ajoutant avant la fermeture de la balise <td> un symbole €, nos montants s'affichent en euro */
                            "<td>".number_format($product["price"], 2, ",", "&nbsp;")."&nbsp;€</td>",
                            "<td>".$product["qtt"]."</td>",
                            "<td>".number_format($product["total"], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "</tr>";
                    
                    /* À l'intérieur de la boucle, grâce à l'opérateur combiné +=, on ajoute le total du produit parcouru à la valeur de $totalGeneral, qui augmente d'autant pour chaque produit. */
                    $totalGeneral+= $product["total"];

                }

                /* Lignes 68 à 71 : Une fois la boucle terminée, nous affichons une dernière ligne avant de refermer notre tableau. Cette ligne contient deux cellules : une cellule fusionnée de 4 cellules (colspan=4) pour l'intitulé, et une cellule affichant le contenu formaté de $totalGeneral avec number_format(). */
                echo "<tr>",
                        "<td colspan=4>Totalgénéral : </td>",
                        "<td> <strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                    "</tr>",
                "</thody>";
            }
        ?>
   </div>

</body>
</html>