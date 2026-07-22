<?php
include 'db_con.php';

$Uname = $_POST['Uname'];
$Status = $_POST['Status'];

$sql = "INSERT INTO users (Uname, Status)
VALUES ('$Uname', '$Status')";

if (mysqli_query($conn, $sql)) {
  header("Location: index.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>