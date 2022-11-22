<?php

  function chercherParEmail($email){
    
    require_once('./database/connexion.php');

    $requet = $pdo->prepare("select * from users where email=?");
    $requet ->execute(array($email));
    return $requet->rowCount();  //return nbr des lignes
  } 
?>