<?php
session_start();
//session_destroy();
unset($_SESSION["nom_user"]);
$_SESSION["erreur"]="Merci pour votre Visite";
$_SESSION["type"]="info";
header("location:connexion.php");

?>