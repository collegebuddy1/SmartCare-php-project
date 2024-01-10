<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php
$_SESSION["id"]=null;
$_SESSION["ErrorMessage"] = null;
$_SESSION["SuccessMessage"] = null;
session_destroy();
Redirect_to("docLogin.php");
?>