<?php 


session_start();
$errors=array();

$mysqli = new mysqli("localhost","root","","db");



if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}



if (isset($_POST['Login2'])) {


		$DoctorID2	= $mysqli -> real_escape_string($_POST['doctorID']);
		$DoctorPassword2= $mysqli -> real_escape_string($_POST['doctorpassword']);
		echo "me" ;
if (empty($DoctorID2)) {
	array_push($errors,"Doctor ID is required");
	echo "meid" ;# code...
}
if (empty($DoctorPassword2)) {
	array_push($errors,"Password is required");
	echo "mepass" ;;# code...
	}


	if (count ($errors)== 0) {

	
		echo "meerr" ;
	

	$queryD="SELECT * FROM doctor WHERE id=('$DoctorID2')AND password=('$DoctorPassword2')";
	$resultD=mysqli_query($mysqli,$queryD);

	if (mysqli_num_rows($resultD) ==1 )  {
	$_SESSION['id']=$DoctorID2;
  	$_SESSION['success']="you are now logged in";
	


  	header('location:Index2.php'); 
}  else{
		array_push($errors,"The ID/Password not correct");
		
	}
}
}
$doctorprofile=($_SESSION['id']);
$querydoctor="SELECT * FROM doctor WHERE id=('$doctorprofile')";
 $resultdoctor= mysqli_query($mysqli, $querydoctor);
 $colD= mysqli_fetch_assoc($resultdoctor);



 ?>



 ?>