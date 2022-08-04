<?php
// Connecting to the database
ob_start();
include("system-connection.php");
include("system-session.php");

$message = "";
  if (!isset($_SESSION['session'])) {
        header('Location: system-login.php');
        session_destroy();
    }

        echo $_POST["name"]."<br>";
        echo $_POST["user_id"]."<br>";
        echo $_POST["createdby"]."<br>";
        echo $_POST["subject"]."<br>";
        echo $_POST["objective"]."<br>";
        
        // echo $_POST["operation_id"]."<br>";
        // echo $_POST["administration_id"]."<br>"
       
if (isset($_POST["submit"])){

      if(isset($_POST["operation_id"])){
              
              $name = $_POST["name"];
              $user_id = $_POST["user_id"];
              $operation_id = $_POST["operation_id"];
              $subject = $_POST["subject"];
              $objective = $_POST["objective"];
              $created_date = date("Y/m/d h:i:s");
              // $status = "Open"; 
             
           
             $sql = "UPDATE operation SET subject = '$subject', objective = '$objective' , created_date = '$created_date' WHERE operation_id = '$operation_id'";

            $query = $conn->prepare( $sql );
            if ($query == false) {
             print_r($conn->errorInfo());
             die ('Error Prepare');
            }
            $sth = $query->execute();
            if ($sth == false) {
             print_r($query->errorInfo());
             die ('Error Execute');
            }

      } else{
        echo "cannot save";
      }

} else if (isset($_POST["admin"])){

   if(isset($_POST["administration_id"])){
              
              $name = $_POST["name"];
              $user_id = $_POST["user_id"];
              $administration_id = $_POST["administration_id"];
              $subject = $_POST["subject"];
              $objective = $_POST["objective"];
              $created_date = date("Y/m/d h:i:s");
              // $status = "Open"; 
             
           
             $sql = "UPDATE administration SET subject = '$subject', objective = '$objective' , created_date = '$created_date' WHERE administration_id = '$administration_id'";

            $query = $conn->prepare( $sql );
            if ($query == false) {
             print_r($conn->errorInfo());
             die ('Error Prepare');
            }
            $sth = $query->execute();
            if ($sth == false) {
             print_r($query->errorInfo());
             die ('Error Execute');
            }

      } else{
        echo "cannot save";
      }
} else if (isset($_POST["sale"])){

   if(isset($_POST["sale_id"])){
              
              $name = $_POST["name"];
              $user_id = $_POST["user_id"];
              $sale_id = $_POST["sale_id"];
              $subject = $_POST["subject"];
              $objective = $_POST["objective"];
              $created_date = date("Y/m/d h:i:s");
              // $status = "Open"; 
             
           
             $sql = "UPDATE sale SET subject = '$subject', objective = '$objective' , created_date = '$created_date' WHERE sale_id = '$sale_id'";

            $query = $conn->prepare( $sql );
            if ($query == false) {
             print_r($conn->errorInfo());
             die ('Error Prepare');
            }
            $sth = $query->execute();
            if ($sth == false) {
             print_r($query->errorInfo());
             die ('Error Execute');
            }

      } else{
        echo "cannot save";
      }
}
header('Location: system-operation.php');
exit();
?>