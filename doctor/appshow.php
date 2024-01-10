<?php include ("server.php"); ?>
<?php
$db_host = "localhost";
$db_name = "db";
$db_user = "root";
$db_pass = "";


$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
<?php

require_once("includes/DB.php");
require_once("includes/Functions.php");
 require_once("includes/Sessions.php");



?>



<!DOCTYPE html>
<html>
<head>
	
</head>

<h2 class="success"> <?php echo @$_GET["ID"]; ?> </h2>
<?php require_once "Dashboard.php"; ?>	

<body>



<div class="container">
    <div class="row ">
        <div class="col">
        <div class="card bg-dark text-light mb-4">
          <div class="card-header">
            <h5><center><b>My Appointments</b></center></h5>
          </div>
    </div>

    </div>
    
</div>



	
		<section class="container py-2 mb-4">
      <div class="row">
        <div class="col-lg-12 p-2">
          <table class="table table-striped table-hover">
            <thead class="thead-dark">
            <tr>
              
              <th>Name</th>
              <th>Gender</th>
              <th>Email</th>
              <th>Contract Number</th>
              <th>Date</th>
              <th>Time</th>
              <th>Update</th>
              <th>Delete</th>
            </tr>
            </thead>








		<?php
	    $sqldoc="SELECT  * FROM  patient   WHERE doc_id=('$doctorprofile')"  ;
		$resultdoc=$mysqli->query($sqldoc);
		if(mysqli_num_rows($resultdoc)>= 1){
			while ($row=$resultdoc->fetch_assoc()) {
				$name=$row['patient_name'];
				$gender=$row['patient_gender'];
				$email=$row['patient_email'];
				$mobile=$row['patient_mobile'];
				$doc_id=$row['doc_id'];
				$Date=$row['date'];
				$timeslot = $row['timeslot'];




 
			
 
  

 ?>   
<tbody>           

              <tr>
                     
						<td><?php echo $name; ?></td>
						<td><?php echo $gender; ?></td>
						<td><?php echo $email; ?></td>
						<td><?php echo  $mobile; ?></td>
                        <td><?php echo  $Date;?></td>
                        <td><?php echo  $timeslot;?></td>
                        <td><a href="book_update.php?id=<?php echo $Id ?>">Update</a></td>
                        <td><a href="book_delete.php?id=<?php echo $Id ?>">Delete</a></td>

              </tr>

              </tbody>
			  <?php } 
}
?> <!--  Ending of While loop -->
          </table>
        </div>
      </div>
    </section>
		
	</table>





</body>
</html>