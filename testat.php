<?php
$servername = "localhost";
$username = "dietghar_diet";
$password = "Admin_012345";
$db = "dietghar_diet";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>