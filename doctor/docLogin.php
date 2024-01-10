
<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctor</title>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Smart Care</title>
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
	<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark scrolling-navbar">
  <a class="navbar-brand" href="#">
    <img src="slide/proicon.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy"><strong><a class="nav-link" href="../index.php">Smart Care</a></strong>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  </div>

</nav>




<div class="container mt-4">
	<div class="row">
	</div>
<body class="Dbody">
	<div class="Dheader">
	<h2>Doctor Login</h2>
</div>
	<form method="post" action="docLogin.php" class="Dform">

<?php include ('errors.php'); ?>

<div class="input-groupD">
	<label>Doctor ID</label>
	<input type="text" name="doctorID">

</div>




<div class="input-groupD">
	<label>Password</label>
	<input type="Password" name="doctorpassword">



<div class="input-groupD">
	<button type="submit" name="Login2" class="btnD"> Login</button>
</div>







</form>
	</div>
</div>


</body>
</html>