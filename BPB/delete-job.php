<?php
// Connecting to the database
include("connection.php");
include("session.php");

$message = "";
 

     echo $_GET['id'].'<br>';

  $job_id = $_GET['id'];

 if(isset($_GET['id']))
 {
    
    $job_id = $_GET['id'];
     try
      {                
        $sql  = "DELETE FROM job WHERE job_id = '$job_id'";          
        $stmt = $conn->prepare($sql);
        // $stmt->bindParam(':job_id',$job_id, PDO::PARAM_INT);        
    $stmt->execute();
      } 
        catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }
}
echo $message;
header('Location: record-career.php');
?>
    