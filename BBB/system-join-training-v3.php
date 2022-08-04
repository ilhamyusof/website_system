<?php
ob_start();
include("system-connection.php");
include("system-session.php");
 
$training_event_id=$_GET['id'];
$training_id=$_GET['training'];
 
// sql to delete a record
$sql = "Delete from training_event where training_event_id = '$training_event_id'";
 
// use exec() because no results are returned

$conn->exec($sql);
header('Location: system-join-training.php?id='.$training_id);
exit();
?>