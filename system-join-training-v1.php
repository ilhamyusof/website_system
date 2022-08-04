<?php
// Connecting to the database
ob_start();
include("system-connection.php");
include("system-session.php");
  if (!isset($_SESSION['session'])) {
        header('Location: system-login.php');
        session_destroy();
    }



// echo $_POST["status"];

    if(isset($_GET["id"])){
        echo $user_id = $_GET["id"];
        echo $training_id = $_GET["training"];
        echo $centers_id = $_GET["branch"];
      try
      {
        $stmt = $conn->prepare("INSERT INTO training_event (user_id, training_id,centers_id) VALUES  (:user_id, :training_id,:centers_id)"); 

        
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':training_id', $training_id);
        $stmt->bindParam(':centers_id', $centers_id);
    $stmt->execute();
      } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }


    }
    
header('Location: system-join-training.php?id='.$training_id);
exit();


?>