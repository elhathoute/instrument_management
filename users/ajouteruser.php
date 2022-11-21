<?php
//pour acceder a la page index il faut faire la login
require_once('../pages/maSession.php');
require_once('../database/connexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $ville = $_POST['ville'];
    $photo = $_POST['photo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    $etat = 0;  //desactiver par default
    $role_id =2;    //user par default

    $requetAddUser =$pdo->prepare("insert into users (`id`, `nom`, `prenom`, `ville`, `email`, `password`, `photo`, `etat`, `role_id`) values(?,?,?,?,?,?,?,?,?)");
    $requetAddUser->execute(array('',$nom,$prenom,$ville,$email,$password,$photo,$etat,$role_id));
    header('location:users.php');
    $_SESSION['success']='vous ete bien ajouter user avec succes!';
}



?>