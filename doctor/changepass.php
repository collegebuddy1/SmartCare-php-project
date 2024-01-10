
<?php session_start() ; ?>

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
 	$id=$_POST['doctorID'];
 	$opwd=$_POST['opwd'];
 	$npwd=$_POST['npwd'];
 	$cpwd=$_POST['cpwd'];

 	$sql=("SELECT ID,code from doctor where ID='$id' and code='$opwd' ");
 	$query = mysqli_query($conn,$sql);
 	$num=mysqli_fetch_array($query);
 	if($num>0){
 		$con=mysqli_query($conn,"UPDATE doctor set code='$npwd' where ID='$id' ");
 		$_SESSION['msg1']="Password Change Successfully";

 	}
 	else{
 		$_SESSION['msg2']="Password Does not match";
 	
        
 	}
 }


?>


	<div class="Dheader">


	<h2> Change Password</h2>
</div>

<form method="post" action="changepass.php" class="Dform">



	<div class="input-groupD">
		<label>Doctor ID</label>
		<input type="text" name="doctorID">

	</div>




	<div class="input-groupD">
		<label>OLD Password</label>
		<input type="Password" name="opwd">
        <label>NEW Password</label>
		<input type="Password" name="npwd">
		<label>Confirm Password</label>
		<input type="Password" name="cpwd">
   

	<div class="input-groupD">
		<button type="submit" name="Submit" class="btnD"> SUBMIT</button>
		<button type ="submit" formaction="docLogin.php" class="btnD button1" >Back</button>
	</div>

	
	

<script src="sweetalert.min.js"></script>
	<?php if(isset($_SESSION['msg1']))
	{
	?>
      	<script type="text/javascript">
 	swal({
  title: "Successfull!",
  text: "Your Password is Changed now!",
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