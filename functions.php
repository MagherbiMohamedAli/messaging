<?php

function getConnexion(){
    $cnx= mysqli_connect("localhost","root","","messagerie2023");
    return $cnx;
}

function getAllUsers(){
    $cnx=getConnexion();
    $tab=[];
    $req=mysqli_query($cnx,"select * from user");
    while($res=mysqli_fetch_array($req)){
        $tab[]=$res;
    }
    mysqli_free_result($req);
    return $tab;
}

function getAllMessageReceivedByUserId($id){
    $cnx=getConnexion();
    $tab=[];
    $req=mysqli_query($cnx,"select * from message,user where iduserreceive={$id} and message.idusersend=user.iduser ");
    while($res=mysqli_fetch_array($req)){
        $tab[]=$res;
    }
    mysqli_free_result($req);
    return $tab;
}

function getAllMessageReceivedNotReadByUserId($id){
    $cnx=getConnexion();
    $tab=[];
    $req=mysqli_query($cnx,"select * from message,user where iduserreceive={$id} and message.idusersend=user.iduser and userread=0 ");
    while($res=mysqli_fetch_array($req)){
        $tab[]=$res;
    }
    mysqli_free_result($req);
    return $tab;
}

function getAllMessageSendByUserId($id){
    $cnx=getConnexion();
    $tab=[];
    $req=mysqli_query($cnx,"select * from message,user where idusersend={$id} and message.iduserreceive=user.iduser ");
    while($res=mysqli_fetch_array($req)){
        $tab[]=$res;
    }
    mysqli_free_result($req);
    return $tab;
}

function sendMessage($idusersend, $iduserreceive,$sujet, $contenu){
    $cnx=getConnexion();
    $d1=date("d-m-Y à h:i:s");
    $req=mysqli_query($cnx,"insert into message values(null, '{$sujet}','{$contenu}',{$idusersend},{$iduserreceive},0,'{$d1}',1) ");
}

function readMessage($idmessage){
    $cnx=getConnexion();
    $req=mysqli_query($cnx,"update message set userread=1 where idmessage={$idmessage}");
}

function getMessageById($id){
    $cnx=getConnexion();
    $m=null;
    $req=mysqli_query($cnx,"select * from message,user where idmessage={$id} and message.idusersend=user.iduser ");
    while($res=mysqli_fetch_array($req)){
        $m=$res;
    }
    mysqli_free_result($req);
    return $m;
}

function deleteMessage($id){
    $cnx=getConnexion();
    $req=mysqli_query($cnx,"delete from message where idmessage={$id}");
}

?>