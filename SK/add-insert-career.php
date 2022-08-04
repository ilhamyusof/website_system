<?php
// Connecting to the database
include("connection.php");
include("session.php");

$message = "";
  if (!isset($_SESSION['session'])) {
        header('Location: insert-career.php');
        session_destroy();
    }

        echo $_POST["title"]."<br>";
        echo $_POST["type"]."<br>";
        echo $_POST["salary"]."<br>";
        echo $_POST["location"]."<br>";
        echo $_POST["description"]."<br>";         
        echo $_POST["requirement"]."<br>";  
        echo $_POST["benefit"]."<br>"; 
        echo $_POST["company"]."<br>";  

       

if(isset($_POST["submit"])){

        
        $title = $_POST["title"];
        $type = $_POST["type"];
        $salary = $_POST["salary"];
        $location = $_POST["location"];       
        $description= $_POST["description"];
        $requirement= $_POST["requirement"];
        $benefit= $_POST["benefit"];
        $company= $_POST["company"];
      //  $status= "Approve";
       
      try
      {
        
        $stmt = $conn->prepare("INSERT INTO job (title, type, salary, location, description, requirement, benefit, company) VALUES  (:title, :type, :salary, :location, :description, :requirement, :benefit, :company)"); 

        
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

}
 echo $message;
header('Location: insert-career.php');

?>