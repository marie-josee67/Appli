<!-- Traitement traitera la requête provenant de la page index.php (après soumission du formulaire), ajoutera le produit avec son nom, son prix, sa quantité et le total calculé (prix × quantité) en session.-->

<?php


session_start(); /* Cette fonction a deux utilités : démarrer une session sur le serveur pour l'utilisateur courant, ou récupérer la session de ce même utilisateur s'il en avait déjà une. */

/* Boucle qui permet de proteger le fichier */
if (isset($_POST["submit"])) {

    /* Nous devons alors vérifier l'intégrité des valeurs transmises dans le tableau $_POST en fonction de celles que nous attendons réellement : */
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT); /* filtre input permet d'éviter que quelqu'un inject du code */

    /* Permet de vérifier si les filtres on fonctionner */
    if ($name && $price && $qtt) {

        /* Tableau associatif pour chaque produit $product */
        $product = [
            "name"   =>  $name,
            "price"  =>  $price,
            "qtt"    =>  $qtt,
            "total"  =>  $price * $qtt
        ];

        
        /*  Cette ligne est particulièrement efficace car :
            1° On sollicite le tableau de session $_SESSION fourni par PHP: 
            2° On indique la clé "products" de ce tableau. Si cette clé n'existait pas auparavant (ex: l'utilisateur ajoute son tout premier produit), PHP la créera au sein de $_SESSION. 
            3° Les deux crochets "[]"2 sont un raccourci pour indiquer à cet emplacement que nous ajoutons une nouvelle entrée au futur tableau "products" associé à cette clé. $_SESSION["products"] doit être lui aussi un tableau afin d'y stocker de nouveaux produits par la suite. */
        $_SESSION["products"][] = $product;
    }
}

/* Cette fonction envoie un nouvel entête HTTP au client. Attention : l'utilisation de la fonction header() nécessite deux précautions : 1° La page qui l'emploie ne doit pas avoir émis un début de réponse avant header() 2°L'appel de la fonction header() n'arrête pas l'exécution du script courant.*/
header("Location:index.php");

/*  bouton ( Vider le panier) suppression des articles du tableau */
if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "deleteAll":
            delete_all();
            break;
    }
}
function delete_all(){
    unset($_SESSION['products']);
    print_r($_SESSION);
    header("location:redap.php");
}

    /*  bouton suppression d'un article du tableau */
