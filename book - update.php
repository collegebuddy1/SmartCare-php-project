<?php

require_once("includes/DB.php");
require_once("includes/Functions.php");
require_once("includes/Sessions.php");
$SearchQueryParameter = @$_GET["id"];

if(isset($_POST["Submit"])){


    $name=$_POST["patient_name"];
    $gender=$_POST["patient_gender"];
    $email=$_POST["patient_email"];
    $mobile=$_POST["patient_mobile"];
    $select_spl=$_POST["selected_specialist"];
    $select_doc=$_POST["selected_doctor"];
    $doc_id=$_POST["ID"];


    $ConnectingDB;
		$sql ="UPDATE patient SET patient_name='$name', patient_gender='$gender', patient_email='$email', patient_mobile='$mobile',
		selected_specialist='$select_spl', selected_doctor='$select_doc', doc_id='$doc_id'  WHERE id='$SearchQueryParameter'";
    $Execute=$ConnectingDB->query($sql);
    if($Execute){
    
        $_SESSION["SuccessMessage"]="Appointment with id  : $SearchQueryParameter updated Successfully";
        Redirect_to("view_appointments.php");
    }else {
        $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
      Redirect_to("view_appointments.php");

    }


}



?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="slide/icon-1.png">

    <title></title>
    
   <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
     <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">

 


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">

    <!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

<!-- HTML Form (wrapped in a .bootstrap-iso div) -->











  </head>

  <b>

   <!--Main Navigation-->
<header>

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
  <div>
        <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="Admin_logout.php" class="nav-link text-danger">
          <i class="fas fa-user-times"></i> Logout</a></li>
      </ul>
        </div>

</nav>
<div style="height:10px; background:#27aae1;"></div>
    <header class="text-light py-3">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-12">
          <a href="Dashboard.php">
          <h1><i class="fas fa-cog" style="color:#27aae1;"></i>Admin Dashboard</h1>
          </div>
          <div class="col-lg-3 mb-2">
            <a href="calender.php" class="btn btn-primary btn-block">
              <i class="fas fa-edit"></i> Book Appointment
            </a>
          </div>
          <div class="col-lg-3 mb-2">
            <a href="Add_doctor.php" class="btn btn-info btn-block">
              <i class="fas fa-folder-plus"></i> Add Doctor
            </a>
          </div>
          <div class="col-lg-3 mb-2 ">
            <a href="Add_admin.php" class="btn btn-warning btn-block">
              <i class="fas fa-user-plus"></i> Add New Admin
            </a>
          </div>
          <div class="col-lg-3 mb-2">
            <a href="view_appointments.php" class="btn btn-success btn-block">
              <i class="fas fa-check"></i> View Appointment
            </a>
          </div>
          <div class="col-lg-3 mb-2">
            <a href="View_doctor.php" class="btn btn-info btn-block">
              <i class="fas fa-folder-plus"></i> View Doctor
            </a>
          </div>
     
        </div>
      </div>
    </header>



<?php ?>

<div class="container">
    <div class="row ">
        <div class="col">
        <div class="card bg-dark text-light mb-4">
          <div class="card-header">
            <h5><center><b>Update Appointment</b></center></h5>
          </div>
    </div>

    </div>
    
</div>
<?php
echo ErrorMessage();
echo SuccessMessage();
?>







<?php
$ConnectingDB;
$sql ="SELECT * FROM patient WHERE  id='$SearchQueryParameter'";
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



}
 
  

 ?>  
      


<div class="container">
  <?php ?><div class="bootstrap-iso">
 <div class="container">
  <div class="row d-flex justify-content-center">
   <div class="col-md-6 col-sm-6 col-xs-12">

                    <div class="row">
                        <div class="col-md-12">
                        <form class="" action="book - update.php?id=<?php echo $SearchQueryParameter; ?>" method="post">
                    
                               
                                <div class="form-group ">
                                   <label class="control-label " for="pname">
                                                Name
                                                   </label>
                                        <input class="form-control" id="pname" name="patient_name" type="text" value="<?php echo $name; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Gender : </label>
                                    <select class="form-control" name="patient_gender"  >
                                    <option>--Select</option> 
                                     <option value="<?php echo $gender; ?>"> Male </option>
                                     <option value="<?php echo $gender; ?>">Female </option>
                                    <option value="<?php echo $gender; ?>">Others</option>
              
                                   </select>
                                   
                                </div>
                                <div class="form-group">
                                    <label for="">Email : </label>
                                    <input required type="email" class="form-control" name="patient_email" value="<?php echo $email; ?>"   >
                                </div>
                                <div class="form-group">
                                    <label for="">Moibile No : </label>
                                    <input required type="text" class="form-control" name="patient_mobile" value="<?php echo $mobile; ?>">
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
                                      <lebel><h5><b>Select Doctor:</b></h5></lebel>
            
                                         <select class="form-control" name="selected_doctor" id="doctor" value="<?php echo $select_doc; ?>">
           
                                           <option class="form-control" >--Select</option>
                                                </select><br>
                                          <lebel><h5><b>Doctor ID Selected:</b></h5></lebel>
            
                                           <select class="form-control" name="ID" id="docNo" value="<?php echo $doc_id; ?>">
           
                                         <option class="form-control" >--Select</option>
                                            </select>

                                            
            


                                          </div>
                                         
                                       

                                          <div>
                                          <input type="submit" class="btn btn-success" name="Submit" value="Enter Appointment">
                                          </div>


                               

                                        
                              
                            </form>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>

        </div>
    </div>

</div>
  







    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
  <script>
$(".book").click(function(){
    var timeslot = $(this).attr('data-timeslot');
    $("#slot").html(timeslot);
    $("#timeslot").val(timeslot);
    $("#myModal").modal("show");
});
</script>
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




</html>
