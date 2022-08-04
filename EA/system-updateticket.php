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



        echo $_POST["ticket_id"]."<br>";
        echo $_POST["remarks"]."<br>";
        
        // $id = $_GET["id"];
        $id = $_POST["ticket_id"];        
        $remarks = $_POST["remarks"];
        $document = $_FILES['documentreply']['name'];
        $status = 'Close';
        
        move_uploaded_file($_FILES['documentreply']['tmp_name'], "ticket/".$document);
     
        // $sql = "UPDATE cctv_view SET  location = '$location' WHERE cctv_id = '$id'";
      $sql = "UPDATE ticket SET remarks = '$remarks', status = '$status' , document2 = '$document' WHERE ticket_id = '$id'";
      
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

header('Location: system-dashboard-ticket.php');
exit();



?>