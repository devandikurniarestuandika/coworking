<?php
include '../../includes/functions.php'; //include functions
include '../../includes/connect.php'; //include connection
$idfunc = new IdFunctions;
$statusfunc = new StatusFunctions;
$chss = new Login;
$chss->SessionCheck();
//Check user role is true
if (!isset($_SESSION['email']) || $_SESSION['status'] != "1") {
  header("Location:../../s.php?auth=info");
}
?>
