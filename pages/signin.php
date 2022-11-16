<?php
session_start();
//si il ya une error soit comte desactiver soit compte n'existe pas
if(isset($_SESSION['error-login']))
{
  // recuperer cette error dans une var
  $error_login = $_SESSION['error-login'];
}else{
  $error_login = '';
}
session_destroy(); //effacer tous les var session (deconnecter)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <title>Login</title>
</head>
<body class="bg-primary" >
    <section class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
      <div class="container col-lg-12   col-md-10">
        <div class="row"> 
            <div class="col-md10 mx-auto rounded shadow bg-white">
             <div class="row">
                <div class="col-md-6">
                    <div class="m-5 text-center">
                     <h1>Welcome!</h1>
                     <?php   if(!empty($_SESSION['success'])) {?>
                     <div class="alert alert-success" >
                      <?php 
                      
                        echo  $_SESSION['success'];
                        unset($_SESSION['success']);
                      
                      ?>
                     </div>
                   <?php  } ?>
                     <!-- error-login-message -->
                     <!-- verifier si ilya au moins une error c-a-d $error_login diff de null -->
                     <?php if(!empty($error_login)) { ?>
                     <div class="alert alert-danger">
                     <?php echo $error_login;?>
                     </div>
                     <?php } ?>
                      <form method="POST" class="m-5" action="Seconnecter.php">
                        <div class="mb-3 text-start ">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control " placeholder="Ex:abcd_ab@gmail.com" type="text" id="email-login" name="email" value=
                            <?php 
                              if(isset($_COOKIE['EMAIL'])){
                                echo $_COOKIE['EMAIL'];
                              }
                            ?>
                            >
                        </div>
                        <div class="mb-3 text-start">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control  " type="password" id="password" name="password" value=
                            <?php 
                              if(isset($_COOKIE['PASSWORD'])){
                                echo $_COOKIE['PASSWORD'];
                              }
                            ?>
                            >
                        </div>
                        <div class="row mb-3">
                           <div class="col-auto ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberme-me" name="rememberme-me">
                                <label class="form-check-label "  for="rememberme-me">Remember Me</label>
                            </div>
                           </div> 
                           <div class="col-auto ">
                            <div class="text-end">
                                <a href="forgetPassword.php">Forgot Password?</a>
                            </div>
                           </div>
                           <div>
                            <input type="submit" class="form-control btn btn-primary mt-3" id="Signin" value="SignIn">
                           </div>
                           <div class="mt-3">
                             <a href="signUp.php" ">Create Account!</a>
                           </div>
                        </div>

                      </form>
                    </div>
                </div>
                <div class="col-md-6">
                <div>
                        <img src="img/login.png" alt="login" class="img-fluid p-5">
                        </div>
                </div> 

             </div>
            </div>
        </div>
      </div>
    </section>
    
</body>
<script src="../js/jquery-3.6.1.min.js"></script> 
 <script src="../js/main.js"></script>
</html>