
<?php include ('server.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="style3.css">

	<style type="text/css">
		.Dbody{
		 background-image: url("im.jpg"); 
		}
		
	.button1 {
  background-color: #4CAF50; /* Green */
 
  display: inline-block;
  font-size: 16px;
  
}
	</style>
</head>
<body class="Dbody">


<?php include('dbconnect.php'); 

 if (isset($_POST['Submit'])){
   
   $DoctorName	= $mysqli -> real_escape_string($_POST['nm']);
   $DoctorEmail	= $mysqli -> real_escape_string($_POST['email']);
   $DoctorCnt	= $mysqli -> real_escape_string($_POST['cnt']);
   $DoctorAdd	= $mysqli -> real_escape_string($_POST['add']);

   if (empty($DoctorName)) {
	array_push($errors,"Doctor Name is required");
	# code...
}
if (empty($DoctorEmail)) {
	array_push($errors,"Doctor Email is required");
	# code...
}
if (empty($DoctorCnt)) {
	array_push($errors,"Doctor Mobile NO is required");
	# code...
}
if (empty($DoctorAdd)) {
	array_push($errors,"Doctor Address is required");
	# code...
}






 	$Unm=$_POST['nm'];
 	$Uemail=$_POST['email'];
 	$Ucnt=$_POST['cnt'];
 	$Uadd=$_POST['add'];

 	$doctorprofile=($_SESSION['ID']);

 	$sql=("SELECT * from doctor where ID='$doctorprofile' ");
 	$query = mysqli_query($conn,$sql);
 	$num=mysqli_fetch_array($query);
 	if($num>0){
 		$con=mysqli_query($conn,"UPDATE doctor set name='$Unm' ,email='$Uemail',mobile='$Ucnt',address='$Uadd' where ID='$doctorprofile' ");
 		$_SESSION['msg1']=" Change Successfully";

 	}
 	else{
 		$_SESSION['msg2']="Password Does not match";
 	
        
 	}
 }


?>


	<div class="Dheader">


	<h2> Update Your Information</h2>
</div>

<form method="post" action="updateinfo.php" class="Dform">
    <?php include ('errors.php'); ?>


	<div class="input-groupD">

		<label>NAME</label>
		<input type="text" name="nm">
        <label>Email</label>
		<input type="text" name="email">
		<label>Contact NO</label>
		<input type="text" name="cnt">
        <label>Address</label>
		<input type="text" name="add">   

	<div class="input-groupD">
		<button type="submit" name="Submit" class="btnD"> SUBMIT</button>
		<button type ="submit" formaction="Index2.php" class="btnD button1" >Back</button>
	</div>
	

	
	

<script src="sweetalert.min.js"></script>
	<?php if(isset($_SESSION['msg1']))
	{
	?>
      	<script type="text/javascript">
 	swal({
  title: "Successfull!",
  text: "Your Information is Updated now!",
  icon: "success",
  button: "OK!",
});
 	</script>
	<?php
	unset($_SESSION['msg1']);
	}

	if(isset($_SESSION['msg2']))
	{
		?>
		<script type="text/javascript">
 	swal({
  title: "FAILED!",
  text: "You Are Inserting Wrong Data!",
  icon: "warning",
  button: "Try Again!",
});
 	</script>

		<?php
		unset($_SESSION['msg2']);
	}
	?>


</form>


</body>
</html>