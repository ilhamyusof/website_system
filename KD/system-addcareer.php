<?php
ob_start();
// Connecting to the database
include("connection.php");
include("session.php");
//Start session
    session_start();


  if (!isset($_SESSION['session'])) {
        header('Location: system-login.php');
        session_destroy();
    }

        echo $_POST["title"]."<br>";
        echo $_POST["type_job"]."<br>";
        echo $_POST["salary"]."<br>";
        // echo $_POST["location"]."<br>";
        echo $_POST["description"]."<br>";         
        echo $_POST["requirement"]."<br>";  
        echo $_POST["benefit"]."<br>"; 
        echo $_POST["company"]."<br>";  

       

if(isset($_POST["submit"])){

        
        $title = $_POST["title"];
        $type_job = $_POST["type_job"];
        $salary = $_POST["salary"];
        // $location = $_POST["location"];       
        $description= $_POST["description"];
        $requirement= $_POST["requirement"];
        $benefit= $_POST["benefit"];
        $company= $_POST["company"];
        $category= $_POST["category"];
        $created_date = date("Y/m/d");
        $status= "Open";
       
      try
      {
        
        $stmt = $conn->prepare("INSERT INTO job (title, type_job, salary, description, requirement, benefit, company,status, category, created_date) VALUES  (:title, :type_job, :salary, :description, :requirement, :benefit, :company,:status, :category, :created_date)"); 

        
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':type_job', $type_job);
        $stmt->bindParam(':salary', $salary);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':requirement', $requirement);
        $stmt->bindParam(':benefit', $benefit);
        $stmt->bindParam(':company', $company);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':created_date', $created_date);
		$stmt->execute();
      } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }

}
error_reporting(0);
header('Location: system-career.php');
exit();
?>