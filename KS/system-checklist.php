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
        echo $id_taskdepartment = $_GET["id"];
        echo $user_id = $_GET["user"];
        echo $moduledepartment_id = $_GET["module"];
        echo $module = $_GET["title"];
        // $id = $_POST["contactus_id"];        
        $status = 'complete';
        
     
        // $sql = "UPDATE cctv_view SET  location = '$location' WHERE cctv_id = '$id'";
      // $sql = "insert career SET status = '$status' WHERE career_id = '$id'";
      
      // $query = $conn->prepare( $sql );
      // if ($query == false) {
      //  print_r($conn->errorInfo());
      //  die ('Error Prepare');
      // }
      // $sth = $query->execute();
      // if ($sth == false) {
      //  print_r($query->errorInfo());
      //  die ('Error Execute');
      // }

      try
      {
        
        
        $stmt = $conn->prepare("INSERT INTO checklist (id_taskdepartment, user_id, moduledepartment_id, module, status) VALUES  (:id_taskdepartment, :user_id, :moduledepartment_id, :module, :status)"); 

        
        $stmt->bindParam(':id_taskdepartment', $id_taskdepartment);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':moduledepartment_id', $moduledepartment_id);
        $stmt->bindParam(':module', $module);
        $stmt->bindParam(':status', $status);
    $stmt->execute();
      } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }


    }
    

// header('Location: lmsmanagementdetail_v1.php?id='.$id_taskdepartment);
header('Location: system-lmsmanagementdetail_v2.php?id='.$moduledepartment_id);
exit();


?>