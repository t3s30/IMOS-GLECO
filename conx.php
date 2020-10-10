<?php
error_reporting(E_ALL);

$host = ""; /* Host name */
$user = ""; /* User */
$password = ""; /* Password */
$dbname = ""; /* Database name */

$mysqli = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error());
  //echo "#####################33";
}else{
  //echo "$$$$$$$$$$$$$$$$$$$$$$";
}