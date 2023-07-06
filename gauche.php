<div class="list-group">
    <a href="home.php" class="list-group-item list-group-item-action active">
        <span class="fa fa-envelope"></span>
        Messages réçus
        <?php
        require_once ("functions.php");
        $m10=getAllMessageReceivedNotReadByUserId($_SESSION["id_user"]);
        ?>
        <span class="badge badge-pill badge-warning"><?=sizeof($m10)  ?></span>
    </a>
    <a href="messagesenvoyes.php" class="list-group-item list-group-item-action">
        <span class="fa fa-paper-plane"></span>
        Messages envoyés
        <span class="badge badge-pill badge-info">5</span>
    </a>
    <a href="#" class="list-group-item list-group-item-action">
        <span class="fa fa-th-large"></span>
        Messages Archivés
    </a>
    <a href="#" class="list-group-item list-group-item-action">
        <span class="fa fa-trash"></span>
        Messages Spams
    </a>
</div>
