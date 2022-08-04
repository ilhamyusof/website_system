<?php
ob_start();
include("system-connection.php");
include("system-session.php");
 
$employee_status_id=$_GET['id'];
$user_id=$_GET['user'];

echo $employee_status_id;
 
// sql to delete a record
$sql = "Delete from employee_status where employee_status_id = '$employee_status_id'";
 
// use exec() because no results are returned

$conn->exec($sql);
header('Location: system-user-view.php?id='.$user_id);
exit();
?>