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
    <link rel="icon" href="slide/icon-1.png">

</head>
<body>
<h2 class="success"> <?php echo @$_GET["id"]; ?> </h2>
    <?php require_once "Dashboard.php"; ?>

 <div class="container">
  <div class="row d-flex justify-content-center">
   <div class="col-md-6 col-sm-6 col-xs-12">
    <div>
			<fieldset>
				<form class="" action="view_appointments.php" method="GET">
        <div class="form-group ">
      <label class="control-label " for="confirmpassword">
       Search
      </label>
      <input class="form-control" id="search" name="Search" placeholder="Use id/patient name" type="text"/>
     </div>
     <div class="form-group">
      <div>
       <button class="btn btn-primary " name="SearchButton" type="submit">
        Search
       </button>
      </div>
				</form>
			</fieldset>
		</div>
   </div>
  </div>
 </div>
 

    
                
<?php

$ConnectingDB;
if (isset($_GET["SearchButton"])){
  
$Search = $_GET["Search"];
$sql = "SELECT * FROM patient WHERE patient_name=:searcH OR id=:searcH";
$stmt=$ConnectingDB->prepare($sql);
$stmt->bindValue(':searcH',$Search);
$stmt->execute();
while($row = $stmt->fetch())
{
  $Id=$row['id'];
  $name=$row['patient_name'];
  $gender=$row['patient_gender'];
  $email=$row['patient_email'];
  $mobile=$row['patient_mobile'];
  $select_spl=$row['selected_specialist'];
  $select_doc=$row['selected_doctor'];
  $doc_id=$row['doc_id'];
  $Date=$row['date'];
  $timeslot = $row['timeslot'];




?>   
<section class="container py-2 mb-4">
      <div class="row">
        <div class="col-lg-12 p-2">
          <table class="table table-striped table-hover">
            <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Gender</th>
              <th>Email</th>
              <th>Contract Number</th>
              <th>Specialist Type</th>
              <th>Doctor Name</th>
              <th>Doctor ID</th>
              <th>Date</th>
              <th>Time</th>
              <th>Update</th>
              <th>Delete</th>
              <th>Search Again</th>
            </tr>
            </thead>
<tbody>           

        <tr>
        <td><?php echo $Id ; ?></td>
						<td><?php echo $name; ?></td>
						<td><?php echo $gender; ?></td>
						<td><?php echo $email; ?></td>
						<td><?php echo  $mobile; ?></td>
						<td><?php echo $select_spl ;?></td>
                        <td><?php echo $select_doc;?></td>
                        <td><?php echo $doc_id;?></td>
                        <td><?php echo  $Date;?></td>
                        <td><?php echo  $timeslot;?></td>
                  <td><a href="book - update.php?id=<?php echo $Id ?>">Update</a></td>
                  <td><a href="book_delete.php?id=<?php echo $Id ?>">Delete</a></td>
                  <td> <a href="view_appointments.php">Search Again</a> </td>

        </tr>

        </tbody>
  <?php } 
}
?>
             <!--  Ending of While loop -->
    </table>
  </div>
</div>
</section>

   
<section class="container py-2 mb-4">
      <div class="row">
        <div class="col-lg-12 p-2">
          <table class="table table-striped table-hover">
            <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Gender</th>
              <th>Email</th>
              <th>Contract Number</th>
              <th>Specialist Type</th>
              <th>Doctor Name</th>
              <th>Doctor ID</th>
              <th>Date</th>
              <th>Time</th>
              <th>Update</th>
              <th>Delete</th>
            </tr>
            </thead>
                
<?php

$ConnectingDB;
$sql ="SELECT * FROM patient" ;
$acc=$ConnectingDB->query($sql);
while($row=$acc->fetch())
{
  $Id=$row['id'];
  $name=$row['patient_name'];
  $gender=$row['patient_gender'];
  $email=$row['patient_email'];
  $mobile=$row['patient_mobile'];
  $select_spl=$row['selected_specialist'];
  $select_doc=$row['selected_doctor'];
  $doc_id=$row['doc_id'];
  $Date=$row['date'];
  $timeslot = $row['timeslot'];
 
  

 ?>   
<tbody>           

              <tr>
                        <td><?php echo $Id ; ?></td>
						<td><?php echo $name; ?></td>
						<td><?php echo $gender; ?></td>
						<td><?php echo $email; ?></td>
						<td><?php echo  $mobile; ?></td>
						<td><?php echo $select_spl ;?></td>
                        <td><?php echo $select_doc;?></td>
                        <td><?php echo $doc_id;?></td>
                        <td><?php echo  $Date;?></td>
                        <td><?php echo  $timeslot;?></td>
                        <td><a href="book - update.php?id=<?php echo $Id ?>">Update</a></td>
                        <td><a href="book_delete.php?id=<?php echo $Id ?>">Delete</a></td>

              </tr>

              </tbody>
        <?php } ?>   <!--  Ending of While loop -->
          </table>
        </div>
      </div>
    </section>