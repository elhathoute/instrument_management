<?php

require_once('maSession.php');
require_once('../database/connexion.php');

$id=isset($_GET['id'])?$_GET['id']:0;
            
$etat=isset($_GET['etat'])?$_GET['etat']:0;

if($etat==1){
    $new_etat=0;
}
else{
    $new_etat=1;
}
$requet=$pdo->prepare("update users set etat=? where id=?");
$result=$requet->execute(array($new_etat,$id));
header('location:users.php');
$_SESSION['success']='vous ete bien activer/desactiver user avec succes!';

?>