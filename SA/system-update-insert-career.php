<?php
// Connecting to the database
ob_start();
//Start session
    session_start();
include("connection.php");
include("session.php");

$message = "";

        echo $_POST["job_id"]."<br>";
        echo $_POST["title"]."<br>";
        echo $_POST["type"]."<br>";
        echo $_POST["salary"]."<br>";
        echo $_POST["location"]."<br><br>";
        echo $_POST["description"]."<br><br>";
        echo $_POST["requirement"]."<br><br>";
        echo $_POST["benefit"]."<br><br>";
        echo $_POST["company"]."<br><br>";  
        

if(isset($_POST["title"])){

         $job_id = $_POST["job_id"];
         $title = $_POST["title"];
         $type = $_POST["type"];
         $salary = $_POST["salary"];
         $location = $_POST["location"];
         $description = $_POST["description"];
         $requirement = $_POST["requirement"];
         $benefit = $_POST["benefit"];
         $company = $_POST["company"];
        
      try
      {
        $sql = "UPDATE job SET title = '$title', type = '$type', salary = '$salary', location = '$location', description = '$description', requirement = '$requirement', benefit = '$benefit', company = '$company' WHERE job_id = '$job_id'"; 

        $stmt = $conn->prepare($sql);          
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':salary', $salary);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':requirement', $requirement);
        $stmt->bindParam(':benefit', $benefit); 
        $stmt->bindParam(':company', $company); 
        
        $stmt->execute();
      } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }
            // header("location:videoupload.php?message=<div class='alert alert-success'>update Success without both thumbnail image and video</div>"); 
      
  }
          


echo $message;
header('Location: record-career.php');
exit();
?>