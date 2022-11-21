
<div id="navbar">

<nav class="navbar navbar-expand-lg  bg-dark  ">
  <div class="container-fluid">
    <a class="navbar-brand me-5" href="http://localhost/management_instruments/index.php"><img src="https://s1.1zoom.me/big0/464/Musical_Instruments_Guitar_560087_1280x853.jpg" width="100" class="logo"/></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item " >
        <a class="nav-link active"   aria-current="page" href="http://localhost/management_instruments/index.php"><i class="fa fa-home"></i> Home</a>
        </li>
        <li class="nav-item" >
       <a class="nav-link active" id="instrument-li" href="http://localhost/management_instruments/instruments/instruments.php"><i class="fa fa-music"></i> Instruments</a>
        </li>
        <li class="nav-item" >
        <a class="nav-link active" href="http://localhost/management_instruments/users/users.php"><i class="fa fa-users"></i> Users</a>

        </li>
       
      </ul>

     
      <ul class="nav navbar-nav navbar-right">
  
      <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <img src="http://localhost/management_instruments/pages/img/<?php 
           if(!empty($_SESSION['user']['photo']))
           echo $_SESSION['user']['photo']; //if photo exist
          else echo "user-1.jpg" ;           //if photo not exist
           ?>" class="rounded-circle" width="50" >
       </a>
         <ul class="dropdown-menu w-25" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="http://localhost/management_instruments/users/view-user.php?id=<?php echo $_SESSION['user']['id'] ?>"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo $_SESSION['user']['nom'] ?></a></li>
           <li><a class="dropdown-item" href="http://localhost/management_instruments/users/editerUser.php?id=<?php echo $_SESSION['user']['id']; ?>&etat=<?php echo  $_SESSION['user']['etat']; ?>&role=<?php echo  $_SESSION['user']['role_id']; ?>"><i class="fa fa-edit"></i>Profile </a></li>
           <li><a class="dropdown-item" href="http://localhost/management_instruments/pages/Sedeconnecter.php"><i class='fa fa-sign-out'></i>logout</a></li>
         </ul>
       </li>
       </ul>
    </div>
  </div>
</nav>
</div>
