<?php
// Connecting to the database
include("connection.php");
include("session.php");

$message = "";
  if (!isset($_SESSION['session'])) {
        header('Location: login.php');
        session_destroy();
    }

        echo $_POST["title"]."<br>";
        echo $_POST["type_job"]."<br>";
        echo $_POST["salary"]."<br>";
        echo $_POST["location"]."<br>";
        echo $_POST["description"]."<br>";         
        echo $_POST["requirement"]."<br>";  
        echo $_POST["benefit"]."<br>"; 
        echo $_POST["company"]."<br>";


       

if(isset($_POST["submit"])){

        
        $title = $_POST["title"];
        $type_job = $_POST["type_job"];
        $salary = $_POST["salary"];
        $location = $_POST["location"];       
        $description= $_POST["description"];
        $requirement= $_POST["requirement"];
        $benefit= $_POST["benefit"];
        $company= $_POST["company"];
        $created_date = date("Y/m/d");
        $status= "New";
       
      try
      {
        
        $stmt = $conn->prepare("INSERT INTO job (title, type_job, salary, location, description, requirement, benefit, company,status, created_date) VALUES  (:title, :type_job, :salary, :location, :description, :requirement, :benefit, :company, :status, :created_date)"); 

        
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':type_job', $type_job);
        $stmt->bindParam(':salary', $salary);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':requirement', $requirement);
        $stmt->bindParam(':benefit', $benefit);
        $stmt->bindParam(':company', $company);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':created_date', $created_date);
        $stmt->execute();
      } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }

}
 echo $message;
header('Location: add-new-career.php');

?>