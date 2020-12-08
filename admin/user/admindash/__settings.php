<?php
include '../../includes/functions.php'; //include functions
include '../../includes/connect.php'; //include connection
$idfunc = new IdFunctions;
$ktpfunc = new KtpFunctions;
$namafunc = new NamaFunctions;
$passfunc = new PassFunctions;
$fotofunc = new FotoFunctions;
$createdfunc = new CreatedatFunctions;
$chss = new Login;
$chss->SessionCheck();
//Check user role is true
if (!isset($_SESSION['username']) || $_SESSION['role'] != "1" || $_SESSION['status'] != "1") {
  header("Location:../../includes/logout.php");
}
?>
