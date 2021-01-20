<?php
$dbhost = "localhost"; //Host
$dbuser = "root"; //Database user
$dbpass = ""; //Database password
$dbname = "ecommerce"; //Database name
$conn = mysqli_connect("$dbhost", "$dbuser", "$dbpass", "$dbname"); //Connection
mysqli_set_charset($conn,"utf8"); //UTF-8 for Turkish letters
?>
