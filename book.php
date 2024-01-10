<?php
$mysqli = new mysqli('localhost', 'root', '', 'db');
if(isset($_GET['date'])){

    
    $date = $_GET['date'];
    $stmt = $mysqli->prepare("select * from patient where date = ?");
    $stmt->bind_param('s', $date);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['timeslot'];
            }
            $stmt->close();
        }
    }
}

if(isset($_POST['Submit'])){


    $name=$_POST['patient_name'];
    $gender=$_POST['patient_gender'];
    $email=$_POST['patient_email'];
    $mobile=$_POST['patient_mobile'];
    $select_spl=$_POST['selected_specialist'];
    $select_doc=$_POST['selected_doctor'];
    $doc_id=$_POST['ID'];
    $timeslot = $_POST['timeslot'];




    $stmt = $mysqli->prepare("select * from patient where date = ? AND timeslot=?");
    $stmt->bind_param('ss', $date, $timeslot);
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            $msg = "<div class='alert alert-danger'>Already Booked</div>";
        }else{
            $stmt = $mysqli->prepare("INSERT INTO patient (patient_name,patient_gender,patient_email,patient_mobile,selected_specialist,selected_doctor,doc_id,date,timeslot) VALUES (?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param('sssssssss', $name,$gender,$email,$mobile, $select_spl,$select_doc,$doc_id,$date,$timeslot);
            $stmt->execute();
            $msg = "<div class='alert alert-success'>Booking Successfull</div>";
            $bookings[] = $timeslot;
            $stmt->close();
            $mysqli->close();
        }
    }
}
$duration = 15;
$cleanup = 0;
$start = "09:00";
$end = "15:00";

function timeslots($duration, $cleanup, $start, $end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots = array();
    
    for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod>$end){
            break;
        }
        
        $slots[] = $intStart->format("H:iA")." - ". $endPeriod->format("H:iA");
        
    }
    
    return $slots;
}




?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>
    
   <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
     <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <link rel="icon" href="slide/icon-1.png">

 


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">












  </head>

  <body>
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
      
<div class="container">
    <div class="row ">
        <div class="col">
        <div class="card bg-dark text-light ">
          <div class="card-header">
            <h5><center><b> Appointment Book for Date: <?php echo date('m/d/Y', strtotime($date)); ?></b></center></h5>
          </div>
        </div>

      </div>
    
   </div>




<div class="container">
<div class="row m-3 p-2">
<div class="col-md-12">
   <?php echo(isset($msg))?$msg:""; ?>
</div>
<?php $timeslots = timeslots($duration, $cleanup, $start, $end); 
    foreach($timeslots as $ts){
?>
<div class="col-md-2">
    <div class="form-group">
       <?php if(in_array($ts, $bookings)){ ?>
       <button class="btn btn-danger"><?php echo $ts; ?></button>
       <?php }else{ ?>
       <button class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
       <?php }  ?>
    </div>
</div>
<?php } ?>
</div>

</div>



<div class="container">
<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                
                    <h4 class="modal-title">Booking for: <span id="slot"></span></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                            <div class="form-group">
                                    <label for="">Time Slot</label>
                                    <input readonly type="text" class="form-control" id="timeslot" name="timeslot">
                                </div>
                               
                                <div class="form-group">
                                    <label for="">Name : </label>
                                    <input required type="text" class="form-control" name="patient_name">
                                </div>
                                <div class="form-group">
                                    <label for="">Gender : </label>
                                    <select class="form-control" name="patient_gender">
                                    <option>--Select</option> 
                                     <option value="Male">Male </option>
                                     <option value="Female">Female </option>
                                    <option value="Others">Others</option>
              
                                   </select>
                                   
                                </div>
                                <div class="form-group">
                                    <label for="">Email : </label>
                                    <input required type="email" class="form-control" name="patient_email">
                                </div>
                                <div class="form-group">
                                    <label for="">Moibile No : </label>
                                    <input required type="text" class="form-control" name="patient_mobile">
                                </div>
                                <div class="form-group">
                                <lebel><h5><b>Specialist You Want for:</b> </h5></lebel>
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
                                      <lebel><h5><b>Select Doctor:</b></h5></lebel>
            
                                         <select class="form-control" name="selected_doctor" id="doctor">
           
                                           <option class="form-control" >--Select</option>
                                                </select><br>
                                          <lebel><h5><b>Doctor ID Selected:</b></h5></lebel>
            
                                           <select class="form-control" name="ID" id="docNo">
           
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
