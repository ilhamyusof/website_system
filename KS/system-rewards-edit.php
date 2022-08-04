<?php
// Connecting to the database
ob_start();
include("system-connection.php");
include("system-session.php");


  if (!isset($_SESSION['session'])) {
        header('Location: system-login.php');
        session_destroy();
    }

if(isset($_POST["submit"])){

        $rewards_id = $_POST["rewards_id"];
        $user_id = $_POST["user_id"];
        $achievement = $_POST["achievement"];
        $dateachievement = $_POST["dateachievement"];
        $description = $_POST["description"];
        
      try
      {
        
        $sql2 = "UPDATE rewards SET achievement = '$achievement', dateachievement = '$dateachievement', description = '$description',  user_id = '$user_id' WHERE rewards_id = '$rewards_id'";

        $query = $conn->prepare( $sql2 );
        if ($query == false) {
         print_r($conn->errorInfo());
         die ('Error Prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
         print_r($query->errorInfo());
         die ('Error Execute');
        }

      } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }

}
 
header('Location: system-user-view.php?id='.$user_id);
exit();
?>