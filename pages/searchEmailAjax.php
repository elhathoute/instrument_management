<?php 
   require_once('../database/connexion.php');
   $email = $_POST['email'];
   if(!empty($_POST['email'])){
     $requet = $pdo->prepare("select * from users where email=?");
    $requet ->execute(array($email));
  
  if($requet->rowCount()>0){
   echo  "<div class='alert alert-danger col-md-12 mb-4 error-email'><strong>ERROR!</strong> email deja exist choisir un autre email  .</div>";
  }else{
    echo  "<div class='alert alert-success col-md-12 mb-4 error-email'><strong>NICE!</strong>email non exist continue .</div>";
    

  }

   }
?>