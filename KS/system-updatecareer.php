<?php
// Connecting to the database
ob_start();
//Start session
    session_start();
include("connection.php");
include("session.php");

// error_reporting(0);
// $message = "";
  if (!isset($_SESSION['session'])) {
        header('Location: system-login.php');
        session_destroy();
    }

        echo $_POST["job_id"]."<br>";
        echo $_POST["title"]."<br>";
        echo $_POST["type_job"]."<br>";
        echo $_POST["salary"]."<br>";
        echo $_POST["description"]."<br>";         
        echo $_POST["requirement"]."<br>";  
        echo $_POST["benefit"]."<br>"; 
        echo $_POST["company"]."<br>"; 
        echo $_POST["status"]."<br>";
        echo $_POST["category"]."<br>"; 

       

        
        $job_id = $_POST["job_id"];
        $title = $_POST["title"];
        $type_job = $_POST["type_job"];
        $salary = $_POST["salary"];
        $category = $_POST["category"];       
        $description= $_POST["description"];
        $requirement= $_POST["requirement"];
        $benefit= $_POST["benefit"];
        $company= $_POST["company"];
        $created_date = date("Y/m/d");
        $status= $_POST["status"];
       
     
       $sql = "UPDATE job SET title = '$title', type_job = '$type_job' , salary = '$salary' , category = '$category' , description = '$description', 
        requirement = '$requirement', benefit = '$benefit', company = '$company' , status = '$status' WHERE job_id = '$job_id'";
      
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


header('Location: system-career.php');
exit();



?>