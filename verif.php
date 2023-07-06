<?php
session_start();
$email=$_POST["email"];
$password=$_POST["password"];
require_once ("functions.php");
$cnx=getConnexion();
$test=0;
$req=mysqli_query($cnx, "select * from user where email='{$email}'");
while($res=mysqli_fetch_array($req)){
    if(password_verify($password,$res["password"])){
        $_SESSION["nom_user"]=$res["prenom"]." ".$res["nom"];
        $_SESSION["id_user"]=$res["iduser"];
        $test=1;
    }
}

if($test==1){
    $d1=date("d-m-Y à h:i:s");
    $req2=mysqli_query($cnx,"update user set date_access = '{$d1}' where iduser= {$_SESSION["id_user"]}");
    header("location:home.php");
}else{
    $_SESSION["erreur"]="SVP, verifiez vos données de connexion !!!";
    $_SESSION["type"]="warning";
    header("location:connexion.php");
}



?>