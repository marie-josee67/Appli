<?php
    session_start(); /* Cette fonction a deux utilités : démarrer une session sur le serveur pour l'utilisateur 
    courant, ou récupérer la session de ce même utilisateur s'il en avait déjà une. */
    
    /* Boucle qui permet de proteget le fichier */
    if (isset($_POST["submit"])){

        /* Nous devons alors vérifier l'intégrité des valeurs transmises dans le tableau $_POST en fonction de celles que nous attendons réellement : */
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

        /* Permet de vérifier si les filtres on fonctionner */
        if($name && $price && $qtt){

        }
    }

    /* Cette fonction envoie un nouvel entête HTTP au client. Attention : l'utilisation de la fonction header() nécessite deux précautions : 1° La page qui l'emploie ne doit pas avoir émis un début de réponse avant header() 2°L'appel de la fonction header() n'arrête pas l'exécution du script courant. 
    */
    header ("Location:index.php");