<?php
session_start();

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "login_test"; /* Database name */
$con = mysqli_connect($host, $user, $password, $dbname);

  // Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}