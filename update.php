<?php

include 'db_con.php';

$id = $_POST['Uid'];

$name = $_POST['Uname'];

$status = $_POST['Status'];

$sql = "UPDATE users
SET
Uname='$name',
Status='$status'
WHERE Uid='$id'";

if($conn->query($sql))
{
    header("Location:index.php");
}
else
{
    echo "Update Failed";
}

?>