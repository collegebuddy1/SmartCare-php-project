<?php include ('server.php'); ?>
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
 
</head>
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
</head>

<?php require_once "Dashboard.php"; ?>		


		

<body >

<div class="container">
    <div class="row ">
        <div class="col">
        <div class="card bg-dark text-light mb-4">
          <div class="card-header">
            <h5><center><b>My Information</b></center></h5>
          </div>
    </div>

    </div>
    
</div>

<div class="bootstrap-iso">
 <div class="container">
  <div class="row d-flex justify-content-center">
   <div class="col-md-6 col-sm-6 col-xs-12">
	<div class="header">
	<form method="post" action="Index2.php" class="info">
		<b>  <h5>
	<label>ID: <?php echo "" .($_SESSION['id']);?></label>

		<br>
		<br>
		<label> Name : <?php echo $colD['name']; ?></label>
					<br>
			 <br> 	   
		<label> Email : <?php echo $colD['email']; ?></label>
					<br>
	   
		
		<br>
		<label> Added By : <?php echo $colD['addedby']; ?></label>
					<br>
		<br>
		<label> Added Time : <?php echo $colD['datetime']; ?></label>
					<br>
		<br>
		<label> Specialized In : <?php echo $colD['specialist']; ?></label>
					<br>
		<br>
		</h5>
		</b>
		





	
	   

</div>
    
  </div>
</div>


 




  



 


</form>


</div>
	
</div>
  </div>
 </div>
</div>








	






</body>
</html>