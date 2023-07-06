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
                    <div class="card-header bg-primary"> Liste des Messages Réçus</div>
                    <a href="send.php" class="btn btn-primary">Envoyer un Message</a>

                    <table class="table table-hover">
                        <thead class="thead-light">
                        <tr><th>De</th> <th>Email</th><th>Sujet</th><th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $messagesrecus1=getAllMessageSendByUserId($_SESSION["id_user"]);
                        foreach ($messagesrecus1 as $k=>$v) {
                            ?>
                            <tr class="bg-info">
                                <td><?=$v["prenom"] ?> <?=$v["nom"] ?></td>
                                <td><?=$v["email"] ?></td>
                                <td><?=$v["sujet"] ?></td>
                                <td>Le <?=$v["datesend"] ?></td>
                                <td>
                                    <button class="btn btn-danger">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                    <button class="btn btn-success">
                                        <span class="fa fa-edit"></span>
                                    </button>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>



                        </tbody>

                    </table>

                </div>

            </div>


        </div>

    </div>

</div>


</body>
</html>