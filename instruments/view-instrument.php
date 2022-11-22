<?php
//pour acceder a la page index il faut faire la login
require_once('../pages/maSession.php');
require_once('../database/connexion.php');

    $id = $_GET['id'];
  

    $requetViewInstrument =$pdo->prepare("select * from instruments where id=?");
    $requetViewInstrument->execute(array($id));
      $result=$requetViewInstrument->fetch();
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
    <link rel="stylesheet" href="../css/style.css">
    <title>Management_Instrument</title>
</head>
<body>
<?php require_once('../pages/navbar.php');?>
<div class="container">
<div class="card m-5" >
  <div class="row g-0">
    <div class="col-md-4">
      <!-- <img src="./img/<?php echo $result['photo']; ?>" class="img-fluid rounded h-100" alt="..."> -->
      <div class="h-100" style="background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url(../pages/img/<?php echo $result['photo']; ?>);">

      </div>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $result['nom']; ?></h5>
        <p class="card-text"><strong>Origine: </strong> <?php echo $result['origine']; ?></p>
        <p class="card-text"><strong>Materiaux: </strong> <?php echo $result['materiaux']; ?></p>
        <p class="card-text"><strong>Dimension: </strong> <?php echo $result['dimension']; ?></p>
        <?php if($result['qte']==0){
echo '<p class="bg-danger rounded text-light"><strong><i class="fa fa-battery-empty" aria-hidden="true"></i>&nbsp;Qte:</strong>'.$result['qte'].'&nbsp;alimenter le stock!</p>';
        }else{
          echo '<p class="bg-light rounded text-dark"><strong><i class="fa fa-battery-full" aria-hidden="true"></i>&nbsp;Qte:</strong>'.$result['qte'].'</p>';
        } ?>
        
        <p class="bg-light rounded text-dark"><strong><i class="fa fa-money"></i>&nbsp;Prix:</strong> <?php echo $result['prix'];?></p>
 
        <p class="card-text"><strong>Description: </strong> <?php echo $result['description']; ?></p>
        <video class="w-50  border rounded p-3 " controls >
  <source src="../pages/img/<?php echo $result['video']; ?>" type="video/mp4">
 
</video>
      </div>
      <div class="card-footer">
      <a class="btn btn-warning" href = "javascript:history.back()" >Back</a>
      </div>
    </div>
  </div>
</div>
</div>
</body>
<script src="../js/jquery-3.6.1.min.js"></script> 
 <script src="../js/main.js"></script>
</html>