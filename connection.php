<?php
$servername = "localhost";
$username = "admin_dietsoft";
$password = "Admin_012345";
$db_name = "admin_dietsoft";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
?>