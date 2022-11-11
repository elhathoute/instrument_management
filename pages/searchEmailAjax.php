<?php 
   require_once('../database/connexion.php');
   $email = $_POST['email'];
   if(!empty($_POST['email'])){
     $requet = $pdo->prepare("select * from users where email=?");
    $requet ->execute(array($email));
  
  if($requet->rowCount()>0){
   echo  "<div class='alert alert-danger col-md-12 mb-4 error-email'>email exist  .</div>";
  }else{
    echo  "<div class='alert alert-success col-md-12 mb-4 error-email'>email non exist  .</div>";
    

  }

   }


  // $email=isset($_POST['email'])  ?  $_POST['email'] :''; // return input of email
  // var_dump($email);
 
  // $requet = $pdo->prepare("select * from users where email=?");
  //   $requet ->execute(array($email));
  
  // if($requet->rowCount()>0){
  //  echo  '<div class="error-email">email exist</div>';
  // }else{
  //  echo  '<div class="error-email">email non exist</div>';
    

  // }
?>