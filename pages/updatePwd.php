<?php
 require_once('../database/connexion.php');
 require_once('../functions/function.php');
 $password =(isset($_POST['password']))?$_POST['password']:'';
 $password_new =(isset($_POST['password-new']))?$_POST['password-new']:'';
 $id=(isset($_POST['id']))?$_POST['id']:'';
 if(!empty($password) &&!empty($password_new)){
    if(($password===$password_new)){

        $requet=$pdo->prepare("update users set password='$password_new' where id=$id");
        $requet->execute();
    
        echo 'mot de passe bien initialiser';
    }else{
        echo 'error';
    }
 }else{
    echo 'les mot de passe non pas vide';
    header('location:forgetPassword.php');
 }





?>