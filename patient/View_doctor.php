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
    
    
















    
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark scrolling-navbar">
  <a class="navbar-brand" href="#">
    <img src="slide/proicon.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy"><strong><a class="nav-link" href="index.php">Smart Care</a></strong>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto p-1">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contract</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Emergency</a>
      </li>
    </ul>
  </div>

</nav>




</head>
<
<
<h2 class="success"> <?php echo @$_GET["id"]; ?> </h2>




  
 <section class="container py-2 mt-5">
    <div class="row ">
        <div class="col">
        <div class="card mb-4 bg-dark text-light">
          <div class="card-header">
            <h5><center><b>Available Doctors</b></center></h5>
          </div>
    </div>
      <div class="row">
        <div class="col-lg-12 p-2">
          <table class="table table-striped table-hover">
            <thead class="thead-dark">
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Specialist Type</th>
              <th>Added Date</th>
            </tr>
            </thead>
                
<?php

$ConnectingDB;
$sql="SELECT * FROM doctor";
$acc=$ConnectingDB->query($sql);
while($row=$acc->fetch())
{
  $name=$row['name'];
  $email=$row['email'];
  $select_spl=$row['specialist'];
  $Date=$row['datetime'];

 
  

 ?>   
<tbody>           

              <tr>
                        
						<td><?php echo $name; ?></td>
						<td><?php echo $email; ?></td>
						<td><?php echo $select_spl ;?></td>
                       
                        <td><?php echo  $Date;?></td>
                       
                   

              </tr>

              </tbody>
        <?php } ?>   <!--  Ending of While loop -->
          </table>
        </div>
      </div>
    </section>



</body>


</html>