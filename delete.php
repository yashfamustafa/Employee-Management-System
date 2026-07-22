<?php

include 'db_con.php';

$id = $_POST['Uid'];

$sql = "DELETE FROM users WHERE Uid='$id'";

if($conn->query($sql))
{
    header("Location:index.php");
}
else
{
    echo "Delete Failed";
}

?>