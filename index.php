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
    <!-- liens entre deux page php -->
    <a href="redap.php"></a>
    
<!-- Présentera un formulaire permettant de renseigner : le nom du produit, son prix unitaire, la quantité désirée -->
    <div id="container">
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
</body>
</html>

<!-- Sources :

https://www.php.net/manual/fr/intro.session.php

https://developer.chrome.com/docs/devtools/

Chrome Devtools : Onglet Network
https://www.youtube.com/watch?v=y4MpceWoeCY

 -->