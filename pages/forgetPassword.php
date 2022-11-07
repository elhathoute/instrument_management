<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <title>Forget Password</title>
</head>
<body class="bg-primary" >
    <section class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
      <div class="container">
        <div class="row"> 
            <div class="col-md10 mx-auto rounded shadow bg-white">
             <div class="row">
                <div class="col-md-8">
                    <div class="m-5 text-center">
                     <h1>Forget Password!</h1>
                      <form method="POST" class="m-5">
                        <div class="row">
                          <div class="col-md-12 mb-4">
                            <div class="form-outline">
                            <input type="text" id="email" class="form-control form-control-lg" placeholder="Entrer Votre Email"/>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <div class="form-outline">
                            <input type="submit" class="form-control form-control-lg btn btn-warning" value="Sent">
                           
                            </div>
                        </div>
                        <div class="mt-3">
                             <a href="signin.php" ">SignIn</a>
                           </div>
                           <div class="mt-3">
                             <a href="signUp.php" ">SignUp</a>
                           </div>
                        </div>
                      
                    </div>
                </div>
                <div class="col-md-4">
                <div>
                        <img src="img/forgetPassword.png" alt="signup" class="img-fluid p-5">
                        </div>
                </div> 

             </div>
            </div>
        </div>
      </div>
    </section>
    
</body>
</html>