<?php 
require_once("includes/DB.php"); 
require_once("includes/Functions.php"); 
require_once("includes/Sessions.php"); 
$SearchQueryParameter = @$_GET["id"];



if(isset($_POST["Submit"])){
  $Name            = $_POST["Name"];
  $Password        = $_POST["Password"];
  $ConfirmPassword = $_POST["ConfirmPassword"];
  $Admin           =  $_SESSION["UserName"];
  $Email           = $_POST["email"];
  $Selected_spe    = $_POST["selected_specialist"];

  date_default_timezone_set("Asia/Dhaka");
  $CurrentTime=time();
  $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
   if ($Password !== $ConfirmPassword) {
    $_SESSION["ErrorMessage"]= "Password and Confirm Password should match";
   }
   else{
        // Query to insert new admin in DB When everything is fine
    $ConnectingDB;
    $ConnectingDB;
    $sql ="UPDATE doctor SET password='$Password', name='$Name', email='$Email', specialist='$Selected_spe',
    datetime='$DateTime', addedby='$Admin' WHERE id='$SearchQueryParameter'";
    $Execute=$ConnectingDB->query($sql);
    if($Execute){
    
        $_SESSION["SuccessMessage"]="Doctor with id  : $SearchQueryParameter updated Successfully";
        Redirect_to("View_doctor.php");
    }else {
        $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
      Redirect_to("View_doctor.php");

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
    <link rel="icon" href="slide/icon-1.png">
    
<!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<script>
    $(document).ready(function(){
        $('#doc_sp').on('change',function () {
            
        
        var docID= $(this).val();
        if(docID){
            $.get(
                "helper.php",
                {doc_sp: docID},
                function (data) {
                    $('#doctor').html(data);
                    
                }
            );
        }
    });
    });
  </script>

<script>
    $(document).ready(function(){
        $('#doctor').on('change',function () {
            
        
        var doNo= $(this).val();
        if(doNo){
            $.get(
                "helper.php",
                {doctor: doNo},
                function (data) {
                    $('#docNo').html(data);
                    
                }
            );
        }
    });
    });
  </script>


</head>
<body>


<?php require_once "Dashboard.php"; ?>

<?php ?>

<div class="container">
    <div class="row ">
        <div class="col">
        <div class="card bg-dark text-light mb-4">
          <div class="card-header">
            <h5><center><b>Update Doctor Record</b></center></h5>
          </div>
    </div>

    </div>
    
</div>
<?php
echo ErrorMessage();
echo SuccessMessage();
?>

<?php require_once "Dashboard.php"; ?> 
 <?php
global $ConnectingDB;
$sql ="SELECT * FROM doctor WHERE  id='$SearchQueryParameter'";
$stmt=$ConnectingDB->query($sql);
while ($row=$stmt->fetch()) {
	$Id=$row['id'];
  $name=$row['name'];
  $email=$row['email'];
  $Password=$row['password'];
  $select_spl=$row['specialist'];
   
    
}

 ?>


<?php ?>
<div>
<form class="" action="doctor_update.php?id=<?php echo $SearchQueryParameter; ?>" method="post">
<fieldset>
<div class="bootstrap-iso">
 <div class="container">
  <div class="row d-flex justify-content-center">
   <div class="col-md-6 col-sm-6 col-xs-12">
     <div class="form-group ">
      <label class="control-label " for="name">
       Name
      </label>
      <input class="form-control" id="name" name="Name" type="text" value="<?php echo $name; ?>"/>
     </div>
     <div class="form-group ">
      <label class="control-label " for="Password">
       Password
      </label>
      <input class="form-control" id="password" name="Password" type="password"  value="<?php echo $Password; ?>"/>
     </div>
     <div class="form-group ">
      <label class="control-label " for="confirmpassword">
       Confirm Password
      </label>
      <input class="form-control" id="confirmpassword" name="ConfirmPassword" type="password" value="<?php echo $Password; ?>"/>
     </div>
     <div class="form-group ">
      <label class="control-label " for="name">
       Email
      </label>
      <input class="form-control" id="name" name="email" type="email" value="<?php echo $email; ?>"/>
     </div>
     
   
     <div class="form-group">
                                <lebel><b> Specialist:</b></lebel>
                                   <select class="form-control" id="doc_sp" name="selected_specialist" value="<?php echo $select_spl ?>">
                                      <option>--Select Specialist</option>
                                         <?php
                                       include('dbconnect.php');
                                         $query="SELECT * FROM doc_sp";
                                          $do=mysqli_query($conn,$query);
                                         while($row = mysqli_fetch_array($do)){
                                          echo '<option value="'.$row['sp_name'].'">'.$row['sp_name'].'</option>';
                                            }
                                       ?>


                                       </select><br>
     
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