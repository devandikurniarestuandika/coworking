<?php
include '../../includes/functions.php'; //include functions
include '../../includes/connect.php'; //include connection
$ufunc = new UserFunctions;
$chss = new Login;
$chss->SessionCheck();
//Check user role is true
if (!isset($_SESSION['username']) || $_SESSION['role'] != "0") {
  header("Location:../../includes/logout.php");
}
?>
