page de deconnexion

<!-- logout button -> https://uiverse.io/Jules-gitclerc/quiet-donkey-50 -->

<?php
session_start();

// On vide toutes les variables de session
$_SESSION = array();

// On détruit la session
session_destroy();

// Redirection vers la page de login admin
header("Location: login.php?message=deconnexion_user");
exit();