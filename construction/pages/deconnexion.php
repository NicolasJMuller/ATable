<?php
session_start();
if (isset($_SESSION["user"])) {
    // si la session est configurer on détruit la variable (pour ce déconnecté)
    session_destroy();
    // On relance la session à vide
    session_start();
    // Il est déconnecté, et on lui dit "tu es deconnecté" 
    $_SESSION['deconnexion']='Deconnecté';
    // on le renvoie vers l'index
    header("Location:../index.php");
}


?>