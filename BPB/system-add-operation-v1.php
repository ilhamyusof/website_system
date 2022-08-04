<?php
// Connecting to the database
ob_start();
include("system-connection.php");
include("system-session.php");
  if (!isset($_SESSION['session'])) {
        header('Location: system-login.php');
        session_destroy();
    }
        // echo $_POST["name"]."<br>";
        // echo $_POST["user_id"]."<br>";
        // echo $_POST["subject"]."<br>";
        // echo $_POST["objective"]."<br>";
     
     if(isset($_POST["submit"])){

       
        $user_id = $_POST["user_id"];
        $subject = $_POST["subject"];
        $objective = $_POST["objective"];
        $created_date = date("Y/m/d h:i:s");
        $status = "Open";
        
     try
      {
        
        $stmt = $conn->prepare("INSERT INTO operation (subject, objective, created_date, user_id) VALUES  (:subject, :objective, :created_date, :user_id)"); 

        
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':objective', $objective);
        $stmt->bindParam(':created_date', $created_date);
        $stmt->bindParam(':user_id', $user_id);        
    $stmt->execute();
      } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }

} else if (isset($_POST["sale"])){

        $user_id = $_POST["user_id"];
        $subject = $_POST["subject"];
        $objective = $_POST["objective"];
        $created_date = date("Y/m/d h:i:s");
        $status = "Open";
        
     try
      {
        
        $stmt = $conn->prepare("INSERT INTO sale (subject, objective, created_date, user_id) VALUES  (:subject, :objective, :created_date, :user_id)"); 

        
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':objective', $objective);
        $stmt->bindParam(':created_date', $created_date);
        $stmt->bindParam(':user_id', $user_id);        
    $stmt->execute();
      } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }
    }

error_reporting(0);
header('Location: system-operation.php');
exit();

?>