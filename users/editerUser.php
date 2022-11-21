

<?php
session_start();

if(isset($_SESSION['user'])){
    require_once('../database/connexion.php');
    $id = $_GET['id'];
    $etat = $_GET['etat']; 
    $role_id =$_GET['role'];   

    $requet = $pdo->prepare("select * from users  where id=? ");
    $requet->execute(array($id));
    $users=$requet->fetch();
   
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $ville = $_POST['ville'];
    if(!empty($_POST['photo']))  $photo = $_POST['photo'];
    else $photo = $users['photo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   

    $requetUpdateUser =$pdo->prepare("UPDATE users SET nom=?,prenom=?,ville=?,photo=?,email=?,password=?,etat=?,role_id=? where id =?");
    $requetUpdateUser->execute(array($nom,$prenom,$ville,$photo,$email,$password,$etat,$role_id,$id));
    header('location:users.php');
    $_SESSION['success']='vous ete bien editer user avec succes!';
}
}
else{
    header('location:../pages/signin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Management_Users</title>
</head>

<body>
    <?php require_once('../pages/navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10  offset-1 ">
                <?php
                
                ?>
            <form action="" method="POST" id="form-user">
                    <div class="modal-header">
                        <h5 id="header-user" class="modal-title">Update users</h5>
                        <a href="users.php" class="btn-close"></a>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" readonly id="user-id" value="<?php echo $users['id']  ;?>" name="id">
                            </div>

                            <div class="mb-1 col-md-6">
                                <label class="form-label">nom</label>
                                <input type="text" class="form-control" id="user-nom" name="nom" autocomplete="off" value="<?php echo $users['nom']  ;?>" placeholder="Exemple:user" required />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label">prenom</label>
                                <input type="text" class="form-control" id="user-prenom" name="prenom" autocomplete="off" value="<?php echo $users['prenom']  ;?>" placeholder="Exemple:user" required />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label">ville</label>
                                <input type="text" class="form-control" id="user-ville" name="ville" value="<?php echo $users['ville']  ;?>" autocomplete="off" placeholder="Exemple:casa" />
                            </div>

                            <div class="mb-1 col-md-6">
                                <label class="form-label">photo</label>
                                <input type="file" class="form-control"   id="instrument-photo" name="photo" />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label">email</label>
                                <input type="email" class="form-control" id="user-email" name="email" value="<?php echo $users['email']  ;?>" autocomplete="off" placeholder="Exemple:user@gmail.com" />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label">password</label>
                                <input type="password" class="form-control" id="user-password" value="<?php echo $users['password']  ;?>" name="password" required />
                            </div>



                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <a href="users.php" class="btn btn-white" >Cancel</a>
						<button  type="submit" name="update" class="btn btn-warning" id="user-update-btn">Update</button>
              
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
<script src="update.js"></script>
<script src="../js/jquery-3.6.1.min.js"></script>
<script src="../js/main.js"></script>

</html>