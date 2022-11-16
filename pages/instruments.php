<?php
//pour acceder a la page index il faut faire la login
require_once('maSession.php');
require_once('../database/connexion.php');
$requet="SELECT instruments.*,users.nom as nom_user,classifications.name as nom_classification,classifications.id as id_classe,fammilles.name as nom_famille,fammilles.id as id_famille FROM  instruments 
left join users on instruments.user_id=users.id 
left join classifications on instruments.classification_id=classifications.id 
left join fammilles on instruments.fammile_id=fammilles.id 
order by id desc ";
$resultInstrument =$pdo->query($requet);
// $result=$requet->execute(); 
//requet sur les famille
$requetFamill="SELECT * FROM fammilles ";
$resultFamille =$pdo->query($requetFamill);
//requet sur la classification
$requetclasse="SELECT * FROM classifications ";
$resultclasse =$pdo->query($requetclasse);


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
<div class="container">
  <!-- container of add and search instruments -->
<div class="container-fluid w-75  margintop ">
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
    <a  href="#modal-instrument" data-bs-toggle="modal" class="btn btn-success rounded-pill" id="add" href=""><i class="fa fa-plus"></i> Add</a>
    </div>
   
   </div>
   </div>
  </div>
</div>
<!-- container of instruments -->
 <div  class="row row-cols-1 row-cols-lg-4 row-cols-md-3 row-cols-sm-2  g-4 justify-content-center cardes  "> 
 <?php while($instrument = $resultInstrument->fetch(PDO::FETCH_ASSOC)){ ?>
 
  <div class="col">
    <div class="card h-100">
      <div class="card-header bg-light h-100 ">
      <img src="img/<?php echo $instrument['photo'];?>" class="card-img-top  rounded h-100" alt="...">
      </div>
      <div class="card-body">
        <h6>#<?php echo $instrument['id'];?> created By  <strong class="text-success"><?php echo $instrument['nom_user'];?></strong></h6>
        <h5 class="card-title"> <?php echo $instrument['nom'];?></h5>
        <!-- <p class="card-text" title="<?php echo $instrument['description'];?>"><?php echo substr( $instrument['description'],0,30)."...";?></p> -->
        <p class="bg-light rounded text-dark"><strong>Classification:</strong> <?php echo $instrument['nom_classification'];?></p>
        <p class="bg-light rounded text-dark"><strong>Famille:</strong> <?php echo $instrument['nom_famille'];?></p>
        <!-- <p class="bg-light rounded text-dark"><strong>Origine:</strong> <?php echo $instrument['origine'];?></p>  -->
      </div>
      <div class="card-footer d-flex justify-content-around">
       <a href="view-instrument.php?id=<?php echo $instrument['id']; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
       <a href="#modal-instrument" 
	   data-origine="<?php echo $instrument['origine'];?>" 
	   data-materiaux="<?php echo $instrument['materiaux'];?>" 
	   data-dimension="<?php echo $instrument['dimension'];?>" 
	   data-qte="<?php echo $instrument['qte'];?>" 
	   data-prix="<?php echo $instrument['prix'];?>" 
	   data-photo="<?php echo $instrument['photo'];?>" 
	   data-video="<?php echo $instrument['video'];?>" 
	    
	   data-desc="<?php echo $instrument['description'];?>" 
	     data-bs-toggle="modal" onclick="edit(<?php echo $instrument['id'].','.$instrument['id_famille'].','.$instrument['id_classe']; ?>)" id="<?php echo $instrument['id'];  ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
       <a href="delete-instrument.php?id=<?php echo $instrument['id']; ?>" onClick="javascript: return confirm('Please confirm deletion of instruments?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
	 
      </div>
    </div>
  </div>
  <?php }?>
 

  
</div>
</div>


<!-- modal ajout instrumrnts -->
<div class="modal fade "  id="modal-instrument">
		<div class="modal-dialog modal-xl">
			<div class="modal-content ">
    
				<form action="ajouterInstrument.php" method="POST" id="form-instrument" >
					<div class="modal-header">
						<h5 id="header-instrument" class="modal-title">Add instruments</h5>
						<a href="#" class="btn-close" data-bs-dismiss="modal"></a>
					</div>
					<div class="modal-body">
				
            <div class="row">
						<div class="mb-3">
							<input type="hidden" class="form-control" readonly id="instrument-id" value="" name="id" >
						</div>
						
						<div class="mb-1 col-md-3">
							<label class="form-label">nom</label>
							<input type="text" class="form-control" id="instrument-nom" name="nom" autocomplete="off"  placeholder="Exemple:instrument"/>
						</div>	
            <div class="mb-1 col-md-3">
							<label class="form-label">origine</label>
							<input type="text" class="form-control" id="instrument-origine" name="origine" autocomplete="off"  placeholder="Exemple:Europe"/>
						</div>
            <div class="mb-1 col-md-3">
							<label class="form-label">materiaux</label>
							<input type="text" class="form-control" id="instrument-materiaux" name="materiaux" autocomplete="off"  placeholder="Exemple:bois"/>
						</div>	
            <div class="mb-1 col-md-3">
							<label class="form-label">dimension</label>
							<input type="text" class="form-control" id="instrument-dimension" name="dimension" autocomplete="off"  placeholder="Exemple:1m"/>
						</div>
            <div class="mb-1 col-md-6">
							<label class="form-label">photo</label>
							<input type="file" class="form-control" id="instrument-photo" name="photo" />
						</div>	
            <div class="mb-1 col-md-6">
							<label class="form-label">video</label>
							<input type="file" class="form-control" id="instrument-video" name="video" />
						</div>	
            <div class="mb-1 col-md-3">
							<label class="form-label">Qte</label>
							<input type="number" class="form-control" id="instrument-qte" name="qte" autocomplete="off"  placeholder="Exemple:10"/>
						</div>
            <div class="mb-1 col-md-3">
							<label class="form-label">prix</label>
							<input type="number" class="form-control" id="instrument-prix" name="prix" autocomplete="off"  placeholder="Exemple:20"/>
						</div>
					
						<div class="mb-3 col-md-3">
							<label class="form-label">famille</label>
							<select class="form-select" id="instrument-famille" name="famille" >
                <option value="" selected>Please select</option>
                <?php while($famille = $resultFamille->fetch(PDO::FETCH_ASSOC)){?>
								<option id="<?php echo  'fammille'.$famille['id'];?>" value="<?php echo  $famille['id'];?>" ><?php echo $famille['name']?></option>
						<?php 	} ?>
							</select>
						</div>
            <div class="mb-3 col-md-3">
							<label class="form-label">classe</label>
							<select class="form-select" id="instrument-classe" name="classe" >
                <option value="" selected>Please select</option>
                <?php while($classe = $resultclasse->fetch(PDO::FETCH_ASSOC)){?>
								<option id="<?php echo  'classe'.$classe['id'];?>" value="<?php echo $classe['id'];?>" ><?php echo $classe['name']?></option>
						<?php 	} ?>
							</select>
						</div>
            <div class="mb-1 col-md-6">
							
							<input type="text" class="form-control" id="instrument-user_id" readonly name="user_id" value="<?php echo $_SESSION['user']['id']; ?>" />
						</div>
					
						<div class="mb-0">
							<label class="form-label">Description</label>
							<textarea class="form-control h-75"  id="instrument-description" name="description" ></textarea>
						</div>
            </div>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
						<button  type="submit" name="update" class="btn btn-warning" id="instrument-update-btn">Update</button>
						<button type="submit" name="save" class="btn btn-primary instrument-action-btn" id="instrument-save-btn">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
  <!--end modal ajout instrumrnts -->



</body>
<script src="update.js"></script>
<script src="../js/jquery-3.6.1.min.js"></script> 
 <script src="../js/main.js"></script>
</html>
