<?php

require_once("includes/DB.php");
require_once("includes/Functions.php");
 require_once("includes/Sessions.php");



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Smart Care</title>
    <!-- MDB icon -->
    <link rel="icon" href="slide/icon-1.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark scrolling-navbar">
        <a class="navbar-brand" href="#">
            <img src="slide/proicon.png" width="30" height="30" class="d-inline-block align-top" alt=""
                loading="lazy"><strong>Smart Care</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
        </div>
        <div>
        <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="Logout_doctor.php" class="nav-link text-danger">
          <i class="fas fa-user-times"></i> Logout</a></li>
      </ul>
        </div>

    </nav>
    <div>
        <div class="container mt-5">

        </div>
    </div>

    
    <div style="height:10px; background:#27aae1;"></div>
    <header class="text-light py-3">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-12">
          <a href="Index2.php">
          <h1><i class="fas fa-cog" style="color:#27aae1;"></i>Doctor Dashboard</h1>
          </div>
          <div class="col-lg-3 mb-2">
            <a href="appshow.php" class="btn btn-primary btn-block">
              <i class="fas fa-edit"></i> View Appointments
            </a>
          </div>
          <div class="col-lg-3 mb-2">
            <a href="doctor_update.php" class="btn btn-info btn-block">
              <i class="fas fa-folder-plus"></i> Edit Profile
            </a>
          </div>
     
        </div>
      </div>
    </header>
    <div class="container">
    <?php
   echo ErrorMessage();
    echo SuccessMessage();
   ?>
    </div>
    


 




    <!-- jQuery -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript"></script>

</body>

</html>