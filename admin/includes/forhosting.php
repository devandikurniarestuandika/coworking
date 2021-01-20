<?php
$dbhost = "localhost"; //Host
$dbuser = "vandikuc"; //Database user
$dbpass = "D3v4nd1070900"; //Database password
$dbname = "vandikuc_ecommerce"; //Database name
$conn = mysqli_connect("$dbhost", "$dbuser", "$dbpass", "$dbname"); //Connection
mysqli_set_charset($conn,"utf8"); //UTF-8 for Turkish letters
?>
