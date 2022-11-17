<?php
//pour acceder a la page index il faut faire la login
require_once('maSession.php');
require_once('../database/connexion.php');

    $id = $_GET['id'];
  

    $requetDeleteUser =$pdo->prepare("delete from users where id=?");
    $requetDeleteUser->execute(array($id));
    header('location:users.php');
    $_SESSION['success']='vous ete bien supprimer user avec succes!';
?>