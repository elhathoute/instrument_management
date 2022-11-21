<?php 
session_start();
   require_once('../database/connexion.php');

   $searchUser = $_POST['searchUser'];


  if(!empty($_POST['searchUser'])){
    $requet=$pdo->prepare("SELECT * FROM  users where nom like ? or id like ?");
$requet->execute(array($searchUser,$searchUser));
}else{
  $requet=$pdo->prepare("SELECT * FROM  users ");
  $requet->execute();
}
// var_dump($resultInstrument->rowCount());
if($requet->rowCount()>0){
   echo "
   <table class='table table-bordered table-dark'>
   <thead>

   <tr>
       <th>#</th>
       <th>Nom</th>
       <th>Prenom</th>
       <th>Ville</th>
       <th>email</th>
       <th>Photo</th>
       <th>Etat</th>
       <th>Role</th>";
       if(($_SESSION['user']['role_id']==1)){
      echo' <th>Action</th>';
      }

      echo '
  </tr>
</thead>
<tbody>';

while($users=$requet->fetch()){
  if($users["etat"]==0){
    echo '  <tr class="table-danger" >';
  }

  else{
    echo '  <tr class="table-success" >';
  }

  echo '
  <td>'. $users["id"].' </td>
  <td>'. $users["nom"].' </td>
  <td>'. $users["prenom"].' </td>
  <td>'. $users["ville"].' </td>
  <td>'. $users["email"].' </td>
  <td><img src="../pages/img/'?><?php echo $users["photo"].'" class="rounded-circle" width="50px"> </td>
  <td>'. $users["etat"].' </td>
  <td>'. $users["role_id"].' </td>
  ';
  if(($_SESSION['user']['role_id']==1)){
 echo' <td>  
 <a href="editerUser.php?id='.$users["id"].'&etat='.$users["etat"].'&role='.$users["role_id"].'" id="edit-user" class="btn btn-warning" ><i class="fa fa-edit"></i></a>
 <a  onclick="return confirm("vous ete sur de supp cette user?");" class="btn btn-danger" href="supprimerUser.php?id='. $users['id'].'"><i class="fa fa-trash"></i></a>
 <a class="btn btn-info" href="activerUser.php?id='.$users["id"].'&etat='.$users["etat"].'">';
 if($users['etat']==0)
 echo '<i class="fa fa-remove"></i>';
else 
 echo '<i class="fa fa-check"></i>';
 echo '
 </a>
 </td>';
  }
  
  
  echo'
  
  </tr>
  ';
  
}




echo '</tbody>
</table>';

  
  
  
}
else{
  echo '
  <div class="container col-md-6">
  <img src="../pages/img/charg9.gif" style="height:160px;width:160px;margin-left:50%;">
    </div>
  ';
}


?>