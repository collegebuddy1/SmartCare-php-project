<?php 
require_once("includes/DB.php"); 
require_once("includes/Functions.php"); 
require_once("includes/Sessions.php"); 


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

  if(empty($Name)||empty($Password)||empty($ConfirmPassword)){
    $_SESSION["ErrorMessage"]= "All fields must be filled out";
    Redirect_to("Add_doctor.php");
  }elseif (strlen($Password)<4) {
    $_SESSION["ErrorMessage"]= "Password should be greater than 3 characters";
    Redirect_to("Add_doctor.php");
  }elseif ($Password !== $ConfirmPassword) {
    $_SESSION["ErrorMessage"]= "Password and Confirm Password should match";
    Redirect_to("Add_doctor.php");
  }else{
    // Query to insert new admin in DB When everything is fine
    $ConnectingDB;
    $sql = "INSERT INTO doctor(password,name,email,specialist,datetime,addedby)";
    $sql .= "VALUES(:passworD,:NamE,:EmaiL,:specialisT,:dateTime,:adminName)";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':passworD',$Password);
    $stmt->bindValue(':NamE',$Name);
    $stmt->bindValue(':EmaiL',$Email);
    $stmt->bindValue(':specialisT',$Selected_spe);
    $stmt->bindValue(':dateTime',$DateTime); 
    $stmt->bindValue(':adminName',$Admin);
    $Execute=$stmt->execute();
    if($Execute){
      $_SESSION["SuccessMessage"]="New Doctor with the name of ".$Name." added Successfully";
      Redirect_to("Add_doctor.php");
    }else {
      $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
      
      Redirect_to("Add_doctor.php");
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
            <h5><center><b>Adding New Doctor</b></center></h5>
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
<form class="" action="Add_doctor.php" method="post">
<fieldset>
<div class="bootstrap-iso">
 <div class="container">
  <div class="row d-flex justify-content-center">
   <div class="col-md-6 col-sm-6 col-xs-12">
     <div class="form-group ">
      <label class="control-label " for="name">
       Name
      </label>
      <input class="form-control" id="name" name="Name" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label " for="Password">
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
     <div class="form-group ">
      <label class="control-label " for="name">
       Email
      </label>
      <input class="form-control" id="name" name="email" type="email"/>
     </div>
     
   
     <div class="form-group">
                                <lebel><h5><b>Specialist You Want for:</b> </h5></lebel>
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