<?php
session_start();
require_once('../database/connexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$email = $_POST['email'];

$password = $_POST['password'];

$rememberMe =$_POST['rememberme-me'];

if(empty($email) || empty($password)){
  
    $_SESSION['error-login']='<strong>Error!</strong>email ou  password est vide!';
    header('location:signin.php');// donc on va rediriger user a la page login
}else{
$requet=$pdo->prepare("SELECT * FROM users where email=? and password=?");
$requet->execute(array($email,$password)); // executer la requete
//tester si user exist ou non
if($user=$requet->fetch()){     // fetch =>return un objet(tableaux associative)  si il existe 
    if($rememberMe==true){//set cookies
        setcookie('EMAIL',$email,time()+86400);  //86400 =>24hours
        setcookie('PASSWORD',$password,time()+86400);
    }
    
    if($user['etat']==1){     //verifier etat (active-1 ou non-0)
        //donc user exist on va crée une session 
        $_SESSION['user']=$user;   // affecter objet =>$user a le champs =>user
        header('location:../index.php');  // donc on va rediriger user a la page index
    }else{//user desactiver
        //afficher message error comme quoi etat est desactivé
        //et enregister cette error a une variable session 
        $_SESSION['error-login']='<strong>Error!</strong>votre compte est désactiver.<br>veuillez contacter Admin!';
        header('location:signin.php');// donc on va rediriger user a la page login
    }
  
}else{// user non exist (objet vide)
   //et enregister cette error a une variable session 
   $_SESSION['error-login']='<strong>Error!</strong>Login ou password incorrecte!';
   header('location:signin.php');// donc on va rediriger user a la page login

}
}
}
?>