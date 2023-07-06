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
                <div class="card ">
                    <div class="card-header bg-primary text-white"> Liste des Messages Réçus</div>


                    <form method="GET" action="add.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sujet</label>
                            <input name="sujet" type="text" class="form-control" placeholder="Sujet">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Utilisateur</label>
                            <select class="form-control" name="users">
                                <?php
                                $users=getAllUsers();
                                foreach ($users as $k=>$v) {
                                    ?>
                                    <option value="<?=$v["iduser"] ?>"><?=$v["prenom"] ?> <?=$v["nom"] ?></option>
                                    <?php
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Message</label>
                            <textarea class="form-control" name="message">
                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>



                </div>

            </div>


        </div>

    </div>

</div>


</body>
</html>
