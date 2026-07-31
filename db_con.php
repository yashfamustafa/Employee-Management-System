<?php
$servername = "sql108.infinityfree.com";
$username = "if0_42530887";
$password = "mynameisyashfa";
$dbname = "if0_42530887_Employees";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
