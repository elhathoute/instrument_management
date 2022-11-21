<?php

  function chercherParEmail($email){
    global $pdo;
    $requet = $pdo->prepare("select * from users where email=?");
    $requet ->execute(array($email));
    return $requet->rowCount();  //return nbr des lignes
  } 



?>