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
$id = $_GET["id"];
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $job_id = $_GET["job"];
        // $id = $_POST["contactus_id"];        
        $status = 'Approve';
        $action_date = date("Y/m/d");
     
        // $sql = "UPDATE cctv_view SET  location = '$location' WHERE cctv_id = '$id'";
      $sql = "UPDATE career SET status = '$status' , action_date = '$action_date' WHERE career_id = '$id'";
      
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

header('Location: system-list-new-career.php?id='.$job_id);
// header('Location: system-edit-new-career.php?id='.$id);
exit();


?>