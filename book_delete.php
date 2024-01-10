
<?php
 require_once("includes/DB.php");
 require_once("includes/Functions.php");
 require_once("includes/Sessions.php");
$SearchQueryParameter = @$_GET["id"];

try {

  $ConnectingDB;
  $ConnectingDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to delete a record
  $sql = "DELETE FROM patient WHERE id=$SearchQueryParameter";

  // use exec() because no results are returned
  $ConnectingDB->exec($sql);
  $_SESSION["SuccessMessage"]="Appointment with id  : $SearchQueryParameter Deteted Successfully";
  Redirect_to("view_appointments.php");
} catch(PDOException $e) {
  $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
  Redirect_to("view_appointments.php");

              
  
}

$ConnectingDB = null;
?>

