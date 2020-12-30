<?php
$dbhost = "sql100.byethost7.com"; //Host
$dbuser = "b7_22950108"; //Database user
$dbpass = "07092000"; //Database password
$dbname = "b7_22950108_ecom"; //Database name
$conn = mysqli_connect("$dbhost", "$dbuser", "$dbpass", "$dbname"); //Connection
mysqli_set_charset($conn,"utf8"); //UTF-8 for Turkish letters
?>
