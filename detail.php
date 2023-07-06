<?php
session_start();
if(!isset($_SESSION["nom_user"])){
    $_SESSION["erreur"]="Accès interdit, merci de se connecter !!!";
    $_SESSION["type"]="danger";
    header("location:connexion.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="bootstrap4/css/bootstrap.min.css"  rel="stylesheet" >
    <script type="text/javascript" src="bootstrap4/js/jquery.min.js" ></script>
    <script type="text/javascript" src="bootstrap4/js/bootstrap.min.js" ></script>
    <link href="fontawesome/css/all.css" rel="stylesheet">

</head>
<body>
<div class="container">

    <?php
    include ("haut.php");
    ?>


    <div class="row" style="margin-top:5px;">
        <div class="col-3">
            <?php
            include ("gauche.php");
            ?>
        </div>

        <div class="col-9">
            <div class="col">
                <?php
                require_once ("functions.php");
                $messagesrecus=getAllMessageReceivedNotReadByUserId($_SESSION["id_user"]);

                ?>
                <?php
                if(sizeof($messagesrecus)>0) {
                    ?>
                    <div class="alert alert-danger">
                        <h4> Vous avez <?= sizeof($messagesrecus) ?> nouveaux messages</h4>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="col">
                <div class="card text-white">
                    <div class="card-header bg-primary"> Détail d'un message</div>

                    <?php
                    $message=getMessageById($_GET["id"]);
                    readMessage($_GET["id"]);
                    ?>
                    <div class="alert alert-warning">
                        <h3> De : <?=$message["prenom"] ?> <?=$message["nom"] ?></h3>
                        <h5> Sujet : <?=$message["sujet"] ?></h5>
                        <h6> Date : Le <?=$message["datesend"] ?> </h6>
                    </div>
                    <div class="alert alert-info">
                        <?= $message["contenu"] ?>
                    </div>


                </div>

            </div>


        </div>

    </div>

</div>


</body>
</html>