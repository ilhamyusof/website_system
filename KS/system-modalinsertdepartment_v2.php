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

        echo $_POST["module"]."<br>";
        echo $_POST["department"]."<br>";
        echo $_POST["description"]."<br>";
          
        $id_department = $_POST["department"];

if(isset($_POST["submit"])){

        
        $module = $_POST["module"];
        $id_department = $_POST["department"];
        $description = $_POST["description"];
       
      try
      {
        
        
        $stmt = $conn->prepare("INSERT INTO moduledepartment (module, description, id_department) VALUES  (:module, :description, :id_department)");         
        $stmt->bindParam(':module', $module);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':id_department', $id_department);
    
		$stmt->execute();
      } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }

}
 
header('Location: system-lmsmanagementdetail.php?id='.$id_department);
exit();

?>