<?php
session_start();


if (!isset($_SESSION['connecté']) || $_SESSION['connecté'] !== true) { // vérifier si l'utilisateur est connecté
    
    $chemin = $_SERVER['REQUEST_URI']; // ici on récupère l'url ou l'utulisateur est par exemple https://co-working.michel.djoumessi.mmi-velizy.fr/connexion/login.php et on le stocke dans la variable $chemin -> ou je l'ai appris https://www.php.net/manual/fr/reserved.variables.server.php

    if (strpos($chemin, '/admin') !== false) { // si l'url contient /admin alors on redirige vers la page de connexion admin
        header('Location: ../connexion/login-admin.php?erreur=non_connecte');

    } else { // si l'url ne contient pas /admin alors on redirige vers la page de connexion utilisateur normal
        header('Location: ../connexion/login.php?erreur=non_connecte');
    }

    exit();
}

$chemin = $_SERVER['REQUEST_URI'];

if (strpos($chemin, '/admin') !== false && $_SESSION['role'] !== 'admin') {
    // Un utilisateur "normal" essaie d'accéder à une page admin
    header('Location: ../connexion/login.php?erreur=acces_refuse_user');
    exit();
}
?>