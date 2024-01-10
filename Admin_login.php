<?php

require_once("includes/DB.php");
require_once("includes/Functions.php");
require_once("includes/Sessions.php");


if (isset($_POST["Submit"])) {
    $UserName = $_POST["Username"];
    $Password = $_POST["Password"];
    if (empty($UserName)||empty($Password)) {
      $_SESSION["ErrorMessage"]= "All fields must be filled out";
      Redirect_to("Admin_login.php");
    }else {
      // code for checking username and password from Database
      $Found_Account=Login_Attempt($UserName,$Password);
      if ($Found_Account) {
        $_SESSION["UserId"]=$Found_Account["id"];
        $_SESSION["UserName"]=$Found_Account["username"];
        $_SESSION["AdminName"]=$Found_Account["aname"];
        $_SESSION["SuccessMessage"]= "Wellcome ".$_SESSION["AdminName"]."!";
        Redirect_to("Dashboard.php");
      }else {
        $_SESSION["ErrorMessage"]="Incorrect Username/Password";
        Redirect_to("Admin_login.php");
      }
    }
  }


?>









<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Smart Care</title>
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
  <link rel="icon" href="slide/icon-1.png">
</head>



<body>
<header>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark scrolling-navbar">
  <a class="navbar-brand" href="#">
    <img src="slide/proicon.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy"><strong><a class="nav-link" href="index.php">Smart Care</a></strong>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  </div>

</nav>

</header>
<form class="vh-100" style="background-color: #508bfc;" action="Admin_login.php" method="post">
  <div class="container py-3 h-100 my-5 ml-5 ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
          <?php
echo ErrorMessage();
echo SuccessMessage();
?>
<?php ?>

            <h3 class="m-3">Admin Login</h3>

            <div class="form-outline m-3">
              <input type="text" id="typeEmailX" name="Username"class="form-control form-control-lg" />
              <label class="form-label" for="typeEmailX">Username</label>
            </div>

            <div class="form-outline m-3">
              <input type="password" id="typePasswordX" name="Password" class="form-control form-control-lg" />
              <label class="form-label" for="typePasswordX">Password</label>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit" name="Submit">Login</button>


          </div>
        </div>
      </div>
    </div>
  </div>
  
</form>
<?php require_once "footer.php"; ?>









    
</body>
</html>