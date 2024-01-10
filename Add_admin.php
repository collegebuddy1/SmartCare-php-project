<?php 
require_once("includes/DB.php"); 
require_once("includes/Functions.php"); 
require_once("includes/Sessions.php"); 


if(isset($_POST["Submit"])){
  $UserName        = $_POST["Username"];
  $Name            = $_POST["Name"];
  $Password        = $_POST["Password"];
  $ConfirmPassword = $_POST["ConfirmPassword"];
  $Admin           =  $_SESSION["UserName"];
  date_default_timezone_set("Asia/Dhaka");
  $CurrentTime=time();
  $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);

  if(empty($UserName)||empty($Password)||empty($ConfirmPassword)){
    $_SESSION["ErrorMessage"]= "All fields must be filled out";
    Redirect_to("Add_admin.php");
  }elseif (strlen($Password)<4) {
    $_SESSION["ErrorMessage"]= "Password should be greater than 3 characters";
    Redirect_to("Add_admin.php");
  }elseif ($Password !== $ConfirmPassword) {
    $_SESSION["ErrorMessage"]= "Password and Confirm Password should match";
    Redirect_to("Add_admin.php");
  }elseif (CheckUserNameExistsOrNot($UserName)) {
    $_SESSION["ErrorMessage"]= "Username Exists. Try Another One! ";
    Redirect_to("Add_admin.php");
  }else{
    // Query to insert new admin in DB When everything is fine
    $ConnectingDB;
    $sql = "INSERT INTO admins(datetime,username,password,aname,addedby)";
    $sql .= "VALUES(:dateTime,:userName,:password,:aName,:adminName)";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':dateTime',$DateTime);
    $stmt->bindValue(':userName',$UserName);
    $stmt->bindValue(':password',$Password);
    $stmt->bindValue(':aName',$Name);
    $stmt->bindValue(':adminName',$Admin);
    $Execute=$stmt->execute();
    if($Execute){
      $_SESSION["SuccessMessage"]="New Admin with the name of ".$UserName." added Successfully";
      Redirect_to("Add_admin.php");
    }else {
      $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
      Redirect_to("Add_admin.php");
    }
  }
} //Ending of Submit Button If-Condition
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Smart Care</title>
    
<!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 
<link rel="icon" href="slide/icon-1.png">

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

<!-- HTML Form (wrapped in a .bootstrap-iso div) -->

</head>
<body>


<?php require_once "Dashboard.php"; ?>

<?php ?>

<div class="container">
    <div class="row ">
        <div class="col">
        <div class="card bg-dark text-light mb-4">
          <div class="card-header">
            <h5><center><b>Adding New Admin</b></center></h5>
          </div>
    </div>

    </div>
    
</div>
<?php
echo ErrorMessage();
echo SuccessMessage();
?>


<?php ?>
<div>
<form class="" action="Add_admin.php" method="post">
<fieldset>
<div class="bootstrap-iso">
 <div class="container">
  <div class="row d-flex justify-content-center">
   <div class="col-md-6 col-sm-6 col-xs-12">
     <div class="form-group ">
      <label class="control-label " for="Username">
       Username
      </label>
      <input class="form-control" name="Username" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label " for="name">
       Name
      </label>
      <input class="form-control" id="name" name="Name" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label " for="password">
       Password
      </label>
      <input class="form-control" id="password" name="Password" type="password"/>
     </div>
     <div class="form-group ">
      <label class="control-label " for="confirmpassword">
       Confirm Password
      </label>
      <input class="form-control" id="confirmpassword" name="ConfirmPassword" type="password"/>
     </div>
     <div class="form-group">
      <div>
       <button class="btn btn-primary " name="Submit" type="submit">
        Submit
       </button>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>
</fieldset>
</form>
</div>







</body>
</html>