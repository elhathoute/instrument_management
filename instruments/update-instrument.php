<?php
session_start();

if(isset($_SESSION['user'])){
require_once('../database/connexion.php');

    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $origine = $_POST['origine'];
    $materiaux = $_POST['materiaux'];
    $dimension = $_POST['dimension'];
    $photo = $_POST['photo'];
    $qte = $_POST['qte'];
    $prix = $_POST['prix'];
    $famille = $_POST['famille'];
    $classe = $_POST['classe'];
    $user_id = $_POST['user_id'];
    $description = $_POST['description'];
    $video = $_POST['video'];

    $requetUpdateInstrument =$pdo->prepare("UPDATE instruments SET nom=?,origine=?,materiaux=?,dimension=?,
    photo=?,description=?,qte=?,prix=?,video=?,fammile_id=?,classification_id=?,user_id=? where id=?");
    $requetUpdateInstrument->execute(array($nom,$origine,$materiaux,$dimension,$photo,$description,$qte,$prix,$video,$famille,$classe,$user_id,$id));
      $result=$requetUpdateInstrument->fetch();

      header('location:instruments.php');
    }else{
      header('location:../pages/signin.php');
  }
?>