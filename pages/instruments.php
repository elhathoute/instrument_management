<?php
//pour acceder a la page index il faut faire la login
require_once('maSession.php');
require_once('../database/connexion.php');
$requet="SELECT instruments.*,users.nom as nom_user,classifications.name as nom_classification,fammilles.name as nom_famille FROM  instruments 
left join users on instruments.user_id=users.id 
left join classifications on instruments.classification_id=classifications.id 
left join fammilles on instruments.fammile_id=fammilles.id 
order by id desc ";
$resultInstrument =$pdo->query($requet);
// $result=$requet->execute(); 



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
  <?php require_once('navbar.php');?>

<div class="container-fluid w-75 margintop ">
  <div class="col">
   <div class="card bg-light">
   <div class="card-header text-center">
    Ajouter et chercher
  </div>
   <div class="card-body d-flex justify-content-around">
    <div>
    <form class="form-inline">
      <input class="form-control" id="search" type="search" placeholder="Search" aria-label="Search">
    </form>
    </div>
    <div>
    <a class="btn btn-success rounded-pill" id="add" href=""><i class="fa fa-plus"></i> Add</a>
    </div>
   
   </div>
   </div>
  </div>
</div>
 <div  class="row row-cols-1 row-cols-lg-4 row-cols-md-3 row-cols-sm-2  g-4 cardes "> 
 <?php while($instrument = $resultInstrument->fetch(PDO::FETCH_ASSOC)){ ?>
 
  <div class="col">
    <div class="card h-100">
      <div class="card-header bg-dark h-50 ">
      <img src="img/<?php echo $instrument['photo'];?>" class="card-img-top  rounded-pill " alt="...">
      </div>
      <div class="card-body">
        <h6>#<?php echo $instrument['id'];?> created By  <strong class="text-success"><?php echo $instrument['nom_user'];?></strong></h6>
        <h5 class="card-title"> <?php echo $instrument['nom'];?></h5>
        <!-- <p class="card-text" title="<?php echo $instrument['description'];?>"><?php echo substr( $instrument['description'],0,30)."...";?></p> -->
        <!-- <p class="bg-light rounded text-dark"><strong>Classification:</strong> <?php echo $instrument['nom_classification'];?></p>
        <p class="bg-light rounded text-dark"><strong>Famille:</strong> <?php echo $instrument['nom_famille'];?></p>
        <p class="bg-light rounded text-dark"><strong>Origine:</strong> <?php echo $instrument['origine'];?></p> -->
       <?php if($instrument['qte']==0){
echo '<p class="bg-danger rounded text-light"><strong><i class="fa fa-battery-empty" aria-hidden="true"></i>&nbsp;Qte:</strong>'.$instrument['qte'].'&nbsp;alimenter le stock!</p>';
        }else{
          echo '<p class="bg-light rounded text-dark"><strong><i class="fa fa-battery-full" aria-hidden="true"></i>&nbsp;Qte:</strong>'.$instrument['qte'].'</p>';
        } ?>
        
        <p class="bg-light rounded text-dark"><strong><i class="fa fa-money"></i>&nbsp;Prix:</strong> <?php echo $instrument['prix'];?></p>
     
      </div>
      <div class="card-footer">
       <button class="btn btn-success"><i class="fa fa-eye"></i></button>
       <button class="btn btn-warning"><i class="fa fa-edit"></i></button>
       <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
      </div>
    </div>
  </div>
  <?php }?>
 

  
</div>

</body>
<script src="../js/jquery-3.6.1.min.js"></script> 
 <script src="../js/main.js"></script>
</html>
