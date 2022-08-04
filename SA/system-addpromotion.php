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

        echo $_POST["title"]."<br>";
        echo $_POST["description"]."<br>";         
        echo $_POST["start_date"]."<br>";  
        echo $_POST["end_date"]."<br>"; 
           

if(isset($_POST["submit"])){

        
        $title = $_POST["title"];
        $description= $_POST["description"];
        $start_date= $_POST["start_date"];
        $end_date= $_POST["end_date"];
        $created_date = date("Y/m/d");
        $status= "Open";
        $image1 = $_FILES['image']['name'];
        $image =  $title.'-'.$image1;
       
      try
      {
         move_uploaded_file($_FILES['image']['tmp_name'], "promotion/".$image);
        
        $stmt = $conn->prepare("INSERT INTO promotion (title, description, start_date, end_date, status, image, created_date) VALUES  (:title, :description, :start_date, :end_date, :status, :image, :created_date)"); 

        
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':start_date', $start_date);
        $stmt->bindParam(':end_date', $end_date);       
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':created_date', $created_date);
		$stmt->execute();
      } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }

}
 
header('Location: system-promotion.php');
exit();
?>