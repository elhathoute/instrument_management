<?php
require_once('../pages/maSession.php');
require_once('../database/connexion.php');

$requet = $pdo->query("select users.*,roles.nom as nom_role from users left join roles on users.role_id=roles.id order by id desc ");


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
    <div class="container  margintop ">
        <div class="col">
            <div class="card bg-light">
                <div class="card-header text-center">
                    Ajouter et chercher 
                </div>
                <div class="card-body d-flex justify-content-around">

                    <div>
                        <form class="form-inline">
                            <input class="form-control" id="search-user" type="search" placeholder="Search" aria-label="Search">
                        </form>
                    </div>
                    <div>
                        <?php if($_SESSION['user']['role_id']==1){?>
                        <a href="#modal-user" data-bs-toggle="modal" class="btn btn-success rounded-pill" id="add-user" href=""><i class="fa fa-plus"></i> Add</a>
                        <?php }?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- success ajout de user -->
    <?php if (!empty($_SESSION['success'])) { ?>
        <div class="container mt-3">
            <div class="col">
                <div class="alert alert-success col-md-8 offset-2">
                    <?php

                    echo  $_SESSION['success'];
                    unset($_SESSION['success']);

                    ?>
                </div>
            </div>

        </div>

    <?php  } ?>
    <!-- :table -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12   table-responsive" id="users">
                <table class="table table-bordered table-dark ">
                    <thead>

                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Ville</th>
                            <th>email</th>
                            <th>Photo</th>
                            <th>Etat</th>
                            <th>Role</th>
                            <?php if($_SESSION['user']['role_id']==1){?>
                            <th>Action</th>
                            <?php } ?> 
                        </tr>

                    </thead>
                    <tbody>
                        <!-- boucle for -->
                        <?php 
                        while ($users = $requet->fetch(PDO::FETCH_ASSOC)) {
                            $id=$users['id'];
                            $requetInstruments = $pdo->query("select user_id from  instruments where user_id=$id");
                             $count=$requetInstruments->fetch(PDO::FETCH_ASSOC);
                            //  $number=$count[0];
                            ?>
                            <tr class="table-<?php echo $users['etat']==1?'success':'danger'?>" >
                                
                                <th><?php echo $users['id'];?></th>
                                <td><?php echo $users['nom']; ?></td>
                                <td><?php echo $users['prenom']; ?></td>
                                <td><?php echo $users['ville']; ?></td>
                                <td><?php echo $users['email']; ?></td>
                                <td><img src="../pages/img/<?php echo $users['photo']; ?>" class="rounded-circle" width="50px" alt=""> </td>
                                <?php if ($users['etat'] == 1) { ?>
                                    <td >active</td>
                                <?php } else { ?>
                                    <td >désactive</td>
                                <?php } ?>
                                <?php if ($users['role_id'] == 1) { ?>
                                    <td ><?php echo $users['nom_role']; ?></td>

                                <?php } else { ?>
                                    <td ><?php echo $users['nom_role']; ?></td>
                                <?php } ?>
                                <?php if($_SESSION['user']['role_id']==1){?>
                                <?php if(empty($count['user_id'])) {?>
                         <!-- if user non lier a une ou plusieurs instruments -->
                                <td>
                              <!-- update -->
                                    <a href="editerUser.php?id=<?php echo $users['id']; ?>&etat=<?php echo $users['etat']; ?>&role=<?php echo $users['role_id']; ?>" id="edit-user" class="btn btn-warning" ><i class="fa fa-edit"></i></a>
                            <!-- delete -->
                                    <a  onclick="return confirm('vous ete sur de supp cette user?');" class="btn btn-danger" href="supprimerUser.php?id=<?php echo $users['id'];?>"><i class="fa fa-trash"></i></a>
                            <!--activer/desactiver  -->
                                    <a class="btn btn-info" href="activerUser.php?id=<?php echo $users['id'];?>&etat=<?php echo $users['etat'];?>">  
                                                <?php  
                                                    if($users['etat']==0)
                                                        echo '<i class="fa fa-remove"></i>';
                                                    else 
                                                        echo '<i class="fa fa-check"></i>';
                                                ?>
                                            </a>
                                </td>
                                <?php }  else {?>
                                     <!-- if user  lier a une ou plusieurs instruments(eliminer la supp  de user) -->
                                <td>
                                      <!-- update -->
                                      <a href="editerUser.php?id=<?php echo $users['id']; ?>&etat=<?php echo $users['etat']; ?>&role=<?php echo $users['role_id']; ?>" id="edit-user" class="btn btn-warning" href=""><i class="fa fa-edit"></i></a>
                                
                                 <!--activer/desactiver  -->
                                <a class="btn btn-info" href="activerUser.php?id=<?php echo $users['id'];?>&etat=<?php echo $users['etat'];?>"> 
                                                <?php  
                                                    if($users['etat']==0)
                                                        echo '<i class="fa fa-remove"></i>';
                                                    else 
                                                        echo '<i class="fa fa-check"></i>';
                                                ?>
                                            </a>
                                </td>

                                <?php } ?> 
                                <?php } ?>  
                                    
                                    
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>

        </div>


    </div>
    <!-- modal add user -->
    <div class="modal fade " id="modal-user">
        <div class="modal-dialog modal-md">
            <div class="modal-content ">

                <form action="ajouteruser.php" method="POST" id="form-user">
                    <div class="modal-header">
                        <h5 id="header-user" class="modal-title">Add users</h5>
                        <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" readonly id="user-id" value="" name="id">
                            </div>

                            <div class="mb-1 col-md-6">
                                <label class="form-label">nom</label>
                                <input type="text" class="form-control" id="user-nom" name="nom" autocomplete="off" placeholder="Exemple:user" required />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label">prenom</label>
                                <input type="text" class="form-control" id="user-prenom" name="prenom" autocomplete="off" placeholder="Exemple:user" required />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label">ville</label>
                                <input type="text" class="form-control" id="user-ville" name="ville" autocomplete="off" placeholder="Exemple:casa" />
                            </div>

                            <div class="mb-1 col-md-6">
                                <label class="form-label">photo</label>
                                <input type="file" class="form-control" id="instrument-photo" name="photo" />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label">email</label>
                                <input type="email" class="form-control" id="user-email" name="email" autocomplete="off" placeholder="Exemple:user@gmail.com" />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label">password</label>
                                <input type="password" class="form-control" id="user-password" name="password" required />
                            </div>



                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
						<!-- <button  type="submit" name="update" class="btn btn-warning" id="user-update-btn">Update</button> -->
                        <button type="submit" name="save" class="btn btn-primary user-action-btn" id="user-save-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
<!-- <script src="search.js"></script> -->
<script src="update.js"></script>
<script src="../js/jquery-3.6.1.min.js"></script>
<script src="../pages/search.js"></script>
<script src="../js/main.js"></script>

</html>