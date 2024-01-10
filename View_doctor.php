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



  
    <section class="container py-2 mb-4">
      <div class="row">
        <div class="col-lg-12 p-2">
          <table class="table table-striped table-hover">
            <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Specialist Type</th>
              <th>Added By</th>
              <th>Added Date</th>
              <th>Update</th>
              <th>Delete</th>
            </tr>
            </thead>
                
<?php

$ConnectingDB;
$sql="SELECT * FROM doctor";
$acc=$ConnectingDB->query($sql);
while($row=$acc->fetch())
{
  $Id=$row['id'];
  $name=$row['name'];
  $email=$row['email'];
  $select_spl=$row['specialist'];
  $Date=$row['datetime'];
  $Addedby = $row['addedby'];
 
  

 ?>   
<tbody>           

              <tr>
                        <td><?php echo $Id ; ?></td>
						<td><?php echo $name; ?></td>
						<td><?php echo $email; ?></td>
						<td><?php echo $select_spl ;?></td>
                        <td><?php echo  $Addedby;?></td>
                        <td><?php echo  $Date;?></td>
                       
                        <td><a href="doctor_update.php?id=<?php echo $Id ?>">Update</a></td>
                        <td><a href="doctor_delete.php?id=<?php echo $Id ?>">Delete</a></td>

              </tr>

              </tbody>
        <?php } ?>   <!--  Ending of While loop -->
          </table>
        </div>
      </div>
    </section>



</body>
</html>