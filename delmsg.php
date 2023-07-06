<?php
require_once("functions.php");
$id=$_GET["id"];
deleteMessage($id);
header("location:home.php");
?>