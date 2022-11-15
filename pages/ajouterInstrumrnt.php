<?php
//pour acceder a la page index il faut faire la login
require_once('maSession.php');
require_once('../database/connexion.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    $requetAddInstrument =$pdo->prepare("insert into instruments (`id`, `nom`, `origine`, `materiaux`, `dimension`, `photo`, `description`, `qte`, `prix`,`video`,`fammile_id`, `classification_id`, `user_id`)  values(?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $requetAddInstrument->execute(array('',$nom,$origine,$materiaux,$dimension,$photo,$description,$qte,$prix,$video,$famille,$classe,$user_id));
    header('location:instruments.php');
}


?>