<?php
//pour acceder a la page index il faut faire la login
require_once('maSession.php');
require_once('../database/connexion.php');

    $id = $_GET['id'];
  

    $requetDeleteInstrument =$pdo->prepare("delete from instruments where id=?");
    $requetDeleteInstrument->execute(array($id));
    header('location:instruments.php');
?>