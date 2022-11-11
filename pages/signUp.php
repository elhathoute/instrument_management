<?php
require_once('../database/connexion.php');
require_once('../functions/function.php');

//accées a cette page seulement via la method POST non GET
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $ville = $_POST['ville'];
    $photo = $_POST['photo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];
    $role_id =2; //type user default
    $etat =0; //  user desactiver  par default
    $arrayOfErrors = array();  //crer une table des error
    //verifier nom
    if (isset($nom)) {        //la variable $nom est exist
        if (strlen($nom) < 4) {  // si la var $nom inf a 4 char
            $arrayOfErrors[] = "ERROR!!le nom doit sup a 4 character!";
        }
    }
    //verifier prenom
    if (isset($prenom)) {
        if (strlen($prenom) < 4) {
            $arrayOfErrors[] = "ERROR!!le prenom doit sup a 4 character!";
        }
    }
    //verifier password
    if (isset($password) && isset($passwordConfirm)) {
        if (empty($password)) { //si le password exist mais  vide
            $arrayOfErrors[] = "ERROR!!password ne peut pas etre vide !";
        }
        if (md5($password) !== md5($passwordConfirm)) {   //crypter les deux password et comparer 
            $arrayOfErrors[] = "ERROR!!les deux password ne sont pas egaux!";
        }
    }

    //verifier email
    if (isset($email)) {
        $email_filter = filter_var($email, FILTER_VALIDATE_EMAIL);       //filter email (supp les balise et les character speciaux) return true si emailvalide
        if ($email_filter === false) {
    $arrayOfErrors[] = "ERROR! email n'est pas valide !";
        }
    }
    //si on na pas aucune error
    if(empty($arrayOfErrors)){
        // verifier email exist deja ou non
        if(chercherParEmail($email)==0){
            $requet =$pdo ->prepare("INSERT INTO users(nom,prenom,ville,email,password,photo,etat,role_id) VALUES(?,?,?,?,?,?,?,?) ");
            $requet->execute(array($nom,$prenom,$ville,$email,$password,$photo,$etat,$role_id));
            //crer var de success 
            $successMessage='felicitation votre compte est cree !';
            echo $successMessage;

        } if(chercherParEmail($email)!=0){
            $arrayOfErrors[] = "ERROR!!email existe deja ! !";
        }
    }
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
    <script src="../js/jquery-3.6.1.min.js"></script>
    
    <script src="main.js"></script>
    <title>SignUp</title>
</head>

<body class="bg-primary">
    <section class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md10 mx-auto rounded shadow bg-white">
                    <div class="row">
                        <div class="col-md-8 ">
                            <div class="m-5 text-center">
                                <h1>Create Account!</h1>
                                <form method="POST" class="m-5">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="nom" name="nom" class="form-control form-control-lg" minlength="4" title="nom doit contenir aux moin 4 character" placeholder="nom" required />
                                            </div>

                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="prenom" name="prenom" class="form-control form-control-lg" minlength="4" title="prenom doit contenir aux moin 4 character" placeholder="prenom" required />
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="ville" name="ville" class="form-control form-control-lg" placeholder="ville" />
                                            </div>

                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="file" id="photo" name="photo" class="form-control form-control-lg" title="photo" />
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="email" name="email" class="form-control form-control-lg  "  placeholder="email"  required />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="password" id="password" name="password" class="form-control form-control-lg  " minlength="3" title="password doit contenir aux moin 3 character" placeholder="password" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="password" id="passwordConfirm" name="passwordConfirm" class="form-control form-control-lg  " minlength="3" title="password doit contenir aux moin 3 character" placeholder="Confirmer password" required />
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div class="form-outline">
                                                <input type="submit" class="form-control form-control-lg btn btn-success" id="SignUp" value="SignUp">

                                            </div>
                                        </div>
                                </form>
                                
                             
                                <!-- afficher les messages D'error -->
                                <?php
                                  if(isset($arrayOfErrors) && !empty($arrayOfErrors)){
                                    foreach($arrayOfErrors as $error){
                                        echo '<div  class="alert alert-danger col-md-12 mb-4 ">'. $error . '</div>';
                                    }
                                  }
                                ?>
                                <!-- error email with ajax -->
                            <div class="error-email"></div>
                           
                                <div class="mt-3">
                                    <a href="signin.php" ">Do you have  Account!</a>
                           </div>
                        </div>
                      
                    </div>
                </div>
                <div class=" col-md-4">
                                        <div>
                                            <img src="img/signup.png" alt="signup" class="img-fluid p-5">
                                        </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
    </section>

</body>

</html>