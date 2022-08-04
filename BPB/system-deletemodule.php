<?php
ob_start();
//Start session
    session_start();
include("connection.php");
include("session.php");
 
$id_department=$_GET['id'];
 
// sql to delete a record
$sql = "Delete from department where id_department = '$id_department'";
 
// use exec() because no results are returned

$conn->exec($sql);
header('location:system-lmspanel_v1.php');
exit();
?>