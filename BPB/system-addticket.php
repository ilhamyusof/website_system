<?php
// Connecting to the database
ob_start();
include("connection.php");
include("session.php");
//Start session
    session_start();


  if (!isset($_SESSION['session'])) {
        header('Location: login.php');
        session_destroy();
    }

      

       

if(isset($_POST["submit"])){

        
        $user_id = $_POST["user_id"];
        $name = $_POST["name"];
        $created_by = $_POST["created_by"];
        $department = $_POST["department"];       
        $duedate= $_POST["duedate"];
        $prioritize= $_POST["prioritize"];
        $type= $_POST["type"];
        $description= $_POST["description"];
        $created_date = date("Y/m/d");
        $status= "New";
        $document = $_FILES['document']['name'];
        // $document =  $name.'-'.$document1;

      try
      {
        move_uploaded_file($_FILES['document']['tmp_name'], "ticket/".$document);
        
        $stmt = $conn->prepare("INSERT INTO ticket (department, duedate, prioritize, type, description, document, status, user_id,created_by, created_date) VALUES  (:department, :duedate, :prioritize, :type, :description, :document, :status, :user_id,:created_by, :created_date)"); 

        
        $stmt->bindParam(':department', $department);
        $stmt->bindParam(':duedate', $duedate);
        $stmt->bindParam(':prioritize', $prioritize);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':document', $document);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':created_by', $created_by);
        $stmt->bindParam(':created_date', $created_date);
		$stmt->execute();
      } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }

}
error_reporting(0);
header('Location: system-e-ticket.php');
exit();
?>