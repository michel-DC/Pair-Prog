fonction de session, login, rôles
<?php
session_start();

if (!isset($_SESSION['connecté']) || $_SESSION['connecté'] !== true) {
    header('Location: ../connexion/login.php?erreur=non_connecte');
    exit();
}
?>