<?php
session_start();
if( ! isset($_SESSION['user'])){ //si user nexiste pas(user non connecter)
    header('location:pages/signin.php');// donc on va rediriger user a la page login
}
?>