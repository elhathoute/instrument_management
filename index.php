<?php
//pour acceder a la page index il faut faire la login
require_once('pages/maSession.php');
require_once('database/connexion.php');
//users
$requetUsers=$pdo->query("SELECT * FROM users");
$countUsers=$requetUsers->rowCount();
//instrument
$requetInstrument=$pdo->query("SELECT * FROM instruments");
$countInstrument=$requetInstrument->rowCount();
//fammille
$requetFammille=$pdo->query("SELECT * FROM fammilles");
$countFammille=$requetFammille->rowCount();
//Classe
$requetClasse=$pdo->query("SELECT * FROM classifications");
$countClasse=$requetClasse->rowCount();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>Dashboard</title>
</head>
<body>
  <?php require_once('pages/navbar.php');?>
<!-- dashboard -->
<div class="container mt-5">


  <div class="row">

                        <!-- users -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row  align-items-center">
                                        <div class="col ">
                                            <div class="text-xs  text-primary text-uppercase mb-1">
                                                Users</div>
                                            <div class="h5 mb-0"><?php echo $countUsers;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- instruments -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row  align-items-center">
                                        <div class="col ">
                                        <div class="text-xs  text-primary text-uppercase mb-1">
                                                Instruments</div>
                                                <div class="h5 mb-0"><?php echo $countInstrument;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-music fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <!-- famille -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row  align-items-center">
                                        <div class="col ">
                                        <div class="text-xs  text-primary text-uppercase mb-1">
                                                Fammille</div>
                                                <div class="h5 mb-0"><?php echo $countFammille;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-headphones fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!-- cllassification -->
                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row  align-items-center">
                                        <div class="col ">
                                        <div class="text-xs  text-primary text-uppercase mb-1">
                                                classifications</div>
                                                <div class="h5 mb-0"><?php echo $countClasse;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-pie-chart fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                             
                        
                        
                       
                       
                        
  
  
  

  </div> 
  </div>

</body>
<script src="./js/jquery-3.6.1.min.js"></script> 
 <script src="./js/main.js"></script>
</html>