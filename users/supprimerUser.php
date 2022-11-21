<?php


session_start();
if(isset($_SESSION['user']) && ($_SESSION['user']['role_id']==1) ){
    require_once('../database/connexion.php');
    $id = $_GET['id'];
    $requetDeleteUser =$pdo->prepare("delete from users where id=?");
    $requetDeleteUser->execute(array($id));
    header('location:users.php');
    $_SESSION['success']='vous ete bien supprimer user avec succes!';
}else{
    header('location:../pages/signin.php');
}
?>