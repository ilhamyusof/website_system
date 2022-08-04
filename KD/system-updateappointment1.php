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



        echo $_POST["inquiry_id"]."<br>";
        echo $_POST["name"]."<br>";
        echo $_POST["email"]."<br>";
        echo $_POST["message"]."<br>";
        echo $_POST["contact"]."<br>";
        echo $_POST["status"]."<br>";
        echo $_POST["type"]."<br>";
        echo $_POST["remark"]."<br>";



        // $id = $_GET["id"];
        $id = $_POST["inquiry_id"];        
        $status = $_POST["status"];
        $remark = $_POST["remark"];
        
     
        // $sql = "UPDATE cctv_view SET  location = '$location' WHERE cctv_id = '$id'";
      $sql = "UPDATE inquiry SET status = '$status',  remark = '$remark'  WHERE inquiry_id = '$id'";
      
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

    

header('Location: system-appointment.php');
exit();


?>