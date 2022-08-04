<?php
ob_start();
// Connecting to the database
include("system-connection.php");
include("system-session.php");


  if (!isset($_SESSION['session'])) {
        header('Location: system-login.php');
        session_destroy();
    }

        echo $_POST["achievement"]."<br>";
        echo $_POST["user_id"]."<br>";
        echo $_POST["dateachievement"]."<br>";
        echo $_POST["description"]."<br>";
        

          
           

if(isset($_POST["submit"])){
        
        $user_id = $_POST["user_id"];
        $achievement = $_POST["achievement"];
        $dateachievement = $_POST["dateachievement"];
        $description = $_POST["description"];
        $created_date = date("Y/m/d h:i:s");
       
      try
      {
        $stmt = $conn->prepare("INSERT INTO rewards (achievement, dateachievement, description, created_date, user_id) VALUES  (:achievement, :dateachievement, :description, :created_date, :user_id)"); 
        
        $stmt->bindParam(':achievement', $achievement);
        $stmt->bindParam(':dateachievement', $dateachievement);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':created_date', $created_date);
        $stmt->bindParam(':user_id', $user_id);
		    $stmt->execute();
      } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }

}
 
header('Location: system-user-view.php?id='.$user_id);
exit();
?>