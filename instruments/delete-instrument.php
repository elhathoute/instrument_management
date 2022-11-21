<?php
session_start();
if(isset($_SESSION['user']) ){
require_once('../database/connexion.php');

    $id = $_GET['id'];
  

    $requetDeleteInstrument =$pdo->prepare("delete from instruments where id=?");
    $requetDeleteInstrument->execute(array($id));
    header('location:instruments.php');
}else{
    header('location:../pages/signin.php');
}
?>