<?php

require_once("includes/Sessions.php");
require_once("includes/DB.php");
require_once("includes/Functions.php");

if(isset($_POST['pat_submit']))
{
    $name=$_POST['patient_name'];
    $gender=$_POST['patient_gender'];
    $email=$_POST['patient_email'];
    $mobile=$_POST['patient_mobile'];
    $date=$_POST['checkup_date'];
   $select_spl=$_POST['selected_specialist'];
    $select_doc=$_POST['selected_doctor'];
    $doc_id=$_POST['ID'];
    $ConnectingDB;
    $sql="INSERT into patient (patient_name,patient_gender,patient_email,patient_mobile,checkup_date,selected_specialist,selected_doctor,doc_id,status)
    values(' $name','$gender',' $email','$mobile','$date','  $select_spl',' $select_doc','$doc_id','0')";
    $stmt=$ConnectingDB->prepare($sql);
    $Execute=$stmt->execute();
    if ($Execute)
    {
        $_SESSION["SuccessMessage"]="Appointment with id : " .$ConnectingDB->lastInsertId()." added Successfully";
        Redirect_to("book_app.php");

    }
    else
    {
      $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
      Redirect_to("book_app.php");
    }
   
}
?>