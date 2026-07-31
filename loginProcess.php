<?php

session_start();

include 'db_con.php';

// Get data from login form
$username = $_POST['username'];
$password = $_POST['password'];

// SQL Query
$sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";

// Execute Query
$result = $conn->query($sql);

// Check if user exists
if($result->num_rows > 0)
{
    // Get user data
    $row = $result->fetch_assoc();

    // Store data in session
    $_SESSION['username'] = $row['username'];
    $_SESSION['id'] = $row['id'];

    // Go to dashboard
    header("Location: index.php");
    exit();
}
else
{
    // Wrong username or password
    echo "<script>
            alert('Invalid Username or Password');
            window.location='login.php';
          </script>";
}

?>