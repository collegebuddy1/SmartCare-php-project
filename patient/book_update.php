<?php
require_once("includes/Sessions.php");
require_once("includes/DB.php");
require_once("includes/Functions.php");


?>




<!doctype html>
<html lang="en">
<head>
  
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https:/resources/demos/style.css">
  <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!--Font Awesome (added because you use icons in your prepend/append)-->
<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
  $(document).ready(function(){
   $("#datepicker").datepicker({
    changeMonth: true,
      changeYear: true,
     dateFormat:'yy-mm-dd',
      

    beforeShowDay: function(date){
  
    var day = date.getDay();
    var month =date.getMonth();
    var currDate= date.getDate();
    if(day==2||day==6){
      return [false];
    }
    else if((month==8)&&((currDate==1)||(currDate==10)||(currDate==28)))
    {
      return [false];
    }
    else{
      return [true];
    }

   }});
  });
  </script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   
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
 



<div class="jumbotron" style="background: url('pa2.jpg')no-repeat;background-size: cover;height: 300px;">
</div>

<?php
echo ErrorMessage();
echo SuccessMessage();
?> 
<?php ?>
   
<div class="bootstrap-iso">
   <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-6 col-sm-6 col-xs-12">

            <form class="form-group" action="func.php" method="post">
              <lebel><h5>Patient Name : </h5> </lebel>
              <input type="text" name="patient_name" class="form-control"><br>
              <lebel><h5>Patient Gender : </h5></lebel>
              <select class="form-control" name="patient_gender">
              <option>--Select</option> 
              <option value="Male">Male </option>
                <option value="Female">Female </option>
                <option value="Others">Others</option>
              
              </select><br>

              <lebel><h5>Email ID : </h5></lebel>
              <input type="text" name="patient_email" class="form-control"><br>
              <lebel><h5>Mobile No : </h5></lebel>
              <input type="text" name="patient_mobile" class="form-control"><br>
              <lebel><h5>Check-Up Date : </h5></lebel>
              <input type="text" name="checkup_date" class="form-control" id="datepicker"><br>
              <lebel><h5>Specialist You Want for:</h5></lebel>
              <div class="form-group">
               <select class="form-control" id="doc_sp" name="selected_specialist">
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
              <lebel><h5>Select Doctor:</h5></lebel>
            
                <select class="form-control" name="selected_doctor" id="doctor">
           
                  <option class="form-control" >--Select</option>
                </select><br>
                <lebel><h5>Doctor ID Selected:</h5></lebel>
            
                <select class="form-control" name="ID" id="docNo">
           
                  <option class="form-control" >--Select</option>
                </select>
            


             </div>

              <br>
              <input type="submit" class="btn btn-success" name="pat_submit" value="Enter Appointment">
            </form>
          </div>


          </div>
        </div>
      </div>
  
      









 
</body>
</html>