<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ajout produit</title>
</head>
<body>
    <!-- Présentera un formulaire permettant de renseigner : le nom du produit, son prix unitaire, la quantité désirée -->
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
      </div>
    <div id="container">
        <nav class="menu">
            <ul> <!-- liste d'éléments sans ordre particulier  -->
                <li class="recapitulatif"><a href="redap.php">Panier</a></li> <!-- liens vers la page-->
            </ul>
        </nav>

        <div class ="AjoutProduit">
            <h1>Ajouter un produit</h1>
            <form action="traitement.php" method="post">  <!-- action (qui indique la cible du formulaire, le fichier à atteindre lorsque l'utilisateur soumettra le formulaire) method (qui précise par quelle méthode HTTP les données du formulaire seront transmises au serveur) -->
                <p>
                    <label>
                        Nom du produit :
                        <input type="text" name="name">  <!-- Chaque input dispose d'un attribut "name", ce qui va permettre à la requête de classer le contenu de la saisie dans des clés portant le nom choisi -->
                    </label>
                </p>

                <p>
                    <label>
                        Prix du produit :
                        <input type="number" step="any" name="price">
                    </label>
                </p>

                <p>
                    <label>
                        Quantité désirée :
                        <input type="number" name="qtt" value ="1">
                    </label>
                </p>

                <p>
                    <input type="submit" name="submit" value="Ajouter le produit">  <!-- Le champ <input type="submit">, représentant le bouton de soumission du formulaire, contient lui aussi un attribut "name". Nous verrons plus bas que ce choix permettra de vérifier côté serveur que le formulaire a bien été validé par l'utilisateur. -->
                </p>
            </form>
        </div>
    </div>

    <!----------------------------------------- Bouton mode Sombre ---------------------------------------
    <div class="btn-toggle">
        <i class="fa-solid fa-moon-stars"></i>
</div>-->

    <!----------------------------------------- fichier JS ----------------------------------------->
    <!--<script src="./ModeSombre.js"></script>-->
    
</body>
</html>

<!-- Sources :

https://www.php.net/manual/fr/intro.session.php

https://developer.chrome.com/docs/devtools/

Chrome Devtools : Onglet Network
https://www.youtube.com/watch?v=y4MpceWoeCY

https://fr.w3docs.com/snippets/html/comment-ajouter-une-bordure-a-un-tableau-html.html#:~:text=Créer%20une%20Bordure%20Pour%20un%20Tableau%20HTML&text=L%27élément%20a,de%20votre%20tableau.       bordures pour tableaux

https://alvarotrigo.com/blog/animated-backgrounds-css/


https://dev.to/webdeasy/top-20-css-buttons-animations-f41

https://www.codeur.com/blog/frameworks-css/

 -->