<?php
ob_start();
include("system-connection.php");
include("system-session.php");
 
$operation_id=$_GET['id'];
 
// sql to delete a record
$sql = "Delete from operation where operation_id = '$operation_id'";
 
// use exec() because no results are returned

$conn->exec($sql);
header('location:system-operation.php');
exit();
?>