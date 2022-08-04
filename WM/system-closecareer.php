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



// echo $_POST["status"];

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        // $id = $_POST["contactus_id"];        
        $status = 'Close';
        
     
        // $sql = "UPDATE cctv_view SET  location = '$location' WHERE cctv_id = '$id'";
      $sql = "UPDATE job SET status = '$status' WHERE job_id = '$id'";
      
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

    }

header('Location: system-career.php');
exit();


?>