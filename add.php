<?php
session_start();
require_once ("functions.php");
$u=$_GET["users"];
$m=$_GET["message"];
$s=$_GET["sujet"];
sendMessage($_SESSION["id_user"],$u,$s,$m);

header("location:home.php");
?>