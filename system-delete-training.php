<?php
ob_start();
include("system-connection.php");
include("system-session.php");
 
$training_id=$_GET['id'];
 
// sql to delete a record
$sql = "Delete from training where training_id = '$training_id'";
 
// use exec() because no results are returned

$conn->exec($sql);
header('location:system-training.php');
exit();
?>