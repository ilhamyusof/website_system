<?php
// Connecting to the database
ob_start();
//Start session
    session_start();
include("connection.php");
include("session.php");


  if (!isset($_SESSION['session'])) {
        header('Location: system-login.php');
        session_destroy();
    }

        echo $_POST["department"]."<br>";
        echo $_POST["category"]."<br>";
          
           

if(isset($_POST["submit"])){

        
        $job_department = $_POST["department"];
        $category = $_POST["category"];
        
        $image1 = $_FILES['image']['name'];
        $image =  $department.'-'.$image1;
       
       
      try
      {
         move_uploaded_file($_FILES['image']['tmp_name'], "department/".$image);
        
        $stmt = $conn->prepare("INSERT INTO department (job_department, image, category) VALUES  (:job_department, :image, :category)"); 

        
        $stmt->bindParam(':job_department', $job_department);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':category', $category);
		$stmt->execute();
      } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }

}
 
header('Location: system-lmspanel.php');
exit();

?>