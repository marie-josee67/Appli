<!--  Affichera tous les produits en session (et en détail) et présentera le total général de tous les produits ajoutés.-->

<?php
    /* A la différence d'index.php, nous aurons besoin ici de parcourir le tableau de session, il est donc nécessaire d'appeler la fonction session_start() en début de fichier afin de récupérer, la session correspondante à l'utilisateur. */
    session_start();
     /*var_dump($_SESSION);
     div;  arrête le programme*/


     
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- Lien CSS Google Front (police) -->
    <style>@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,300&display=swap');</style>
    
    <!-- Lien CSS Font Awesome (icônes) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Récapitulatif des produits</title>

    <!-- Bordures du tableau et sont fond colorer -->
    <style>
      table,
      td,
      th {
        padding: 10px;
        border: 2px solid #1c87c9;
        background-color: #e5e5e5;
        text-align: center;
      }
    </style>

</head>
<body>
    <!--------------------------------------- fond d'écran ------------------------------->
<div class="fonddEcran">
    <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
    
  </div>
    <div id ="recapitulatif">
        <nav class="menu">
                    <button class="Produits"><a href="index.php"><span style="color:#FFFFFF;">Produits</span></a></button> <!-- liens vers la page-->
        </nav>
        <?php
            /* Vérification du tableau qu'il contien bien des informations  =>  <?php var_dump($_SESSION); ?> */

            /* Nous rajoutons une condition qui vérifie :
            Soit la clé "products" du tableau de session $_SESSION n'existe pas : !isset()
            Soit cette clé existe mais ne contient aucune donnée : empty()*/
            if (!isset($_SESSION["products"])|| empty ( $_SESSION["products"])){
                echo '<span style="color:#FFFFFF;">'.'Aucun produit en session ...'.'</span>';
            }
            else{ 

                /* De la ligne 81 à la ligne 90, nous trouvons les balises HTML initialisant correctement un tableau HTML avec une ligne d'en-têtes <thead>, afin de bien décomposer les données de chaque produit. */
                echo "<table id ='table'>",
                        "<thead>",
                            "<tr id ='tableau'>",
                                "<th>#</th>",
                                "<th>Nom</th>",
                                "<th>Prix</th>",
                                "<th>Quantité</th>",
                                "<th>Total</th>",
                                "<th>Suppression</th>",
                            "</tr>",
                        "</thead>",
                        "<tbody>";
                        
                        /*session_destroy(); /*enlève tous se qui est stocker en session peut être mis n'importe ou sauf dans une boucle ou fonction*/
                        
                        /* Dans un premier temps, avant la boucle, on initialise une nouvelle variable $totalGeneral à zéro. */
                        $totalGeneral = 0;
                        $totalProduit = 0;
                        
                        /* La boucle itérative foreach(), particulièrement efficace pour exécuter, produit par produit, les mêmes instructions qui vont permettre l'affichage uniforme de chacun d'entre eux. Pour chaque donnée dans $_SESSION['products'], nous disposerons au sein de la boucle de deux variables :

                            $index : aura pour valeur l'index du tableau $_SESSION['products'] parcouru. Nous pourrons numéroter ainsi chaque produit avec ce numéro dans le tableau HTML (en première colonne).

                $product : cette variable contiendra le produit, sous forme de tableau, tel que l'a créé et stocké en session le fichier traitement.php. */

                foreach($_SESSION["products"] as $index => $product) {
                    echo "<tr class='interieur'>",
                            "<td class='nombre'>".$index."</td>",
                            "<td class='designation'>".$product["name"]."</td>",
                            /* La fonction PHP number_format() permet de modifier l'affichage d'une valeur numérique en précisant plusieurs paramètres. En ajoutant avant la fermeture de la balise <td> un symbole €, nos montants s'affichent en euro */
                            "<td class='prix'>".number_format($product["price"], 2, ",", "&nbsp;")."&nbsp;€</td>",
                            "<td class='quantiter'>".$product["qtt"]."</td>",
                            "<td class='total'>".number_format($product["total"], 2, ",", "&nbsp;")."&nbsp;€</td>",
                            "<td class='supprimer'><a href='redap.php?action=deleteAll'><i class='fa-solid fa-trash-can-arrow-up'></i></a></td>", /* icon poubelle <i class='fa-solid fa-trash-can-arrow-up'></i> */
                            "</tr>";
                            /* À l'intérieur de la boucle, grâce à l'opérateur combiné +=, on ajoute le total du produit parcouru à la valeur de $totalGeneral, qui augmente d'autant pour chaque produit. */
                            "<br>";$totalProduit+= $product["qtt"];
                            "<br>";$totalGeneral+= $product["total"];
                            
                        }

                        
                        /* code pour afficher le nombre de produits dans le tableau */
                        echo "<tr>",
                        "<td colspan=3>Total produits : </td>",
                        "<td class='totalProduit'> $totalProduit</td>",
                        "</tr>",
                        "</thody>";

                        /* Lignes 128 à 131 : Une fois la boucle terminée, nous affichons une dernière ligne avant de refermer notre tableau. Cette ligne contient deux cellules : une cellule fusionnée de 4 cellules (colspan=4) pour l'intitulé, et une cellule affichant le contenu formaté de $totalGeneral avec number_format(). */
                        echo "<tr>",
                        "<td colspan=4>Total général : </td>",
                        "<td class='general'> <strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                        "</tr>",
                        "</thody>";
                    } 
                    /* bouton pour supprimer les produits du panier */
                    ?>
                    <div class ="boutonPanier">
                        <a href= "traitement.php?action=deleteAll"><i class="fa-duotone fa-cauldron"></i> <span style="color:#FFFFFF;">Vider le panier</span></a>
                        <a href="traitement.php?action=SupprimerTous">
                    </div>
   </div>

</body>
</html>