<?php
date_default_timezone_set("Asia/kolkata");
$servername = "localhost";
$username = "root";
$password = "Admin_012345";
$dbname = "admin_diet0";
$con = new mysqli($servername, $username, $password,$dbname);
if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}
echo "";
?>