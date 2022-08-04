<?php
ob_start();
// Connecting to the database
include("connection.php");
include("session.php");

session_start();
  if (!isset($_SESSION['session'])) {
        header('Location: login.php');
        session_destroy();
    }

      

       

if(isset($_POST["submit"])){

        
        $user_id = $_POST["user_id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $created_by = $_POST["created_by"];
        $lead = $_POST["lead"];       
        $notes= $_POST["notes"];
        // $inquiring= $_POST["inquiring"];
        // $identification= $_POST["identification"];
        $gender= $_POST["gender"];
        // $ic= $_POST["ic"];
        $pain_id= $_POST["pain"];
        // $package_id= $_POST["package"];
        $engagement_id= $_POST["engagement"];
        $status= $_POST["status"];
        $centers_id= $_POST["branch"];
        $notes= $_POST["notes"];
        $created_date = date("Y/m/d");
        $payment = $_FILES['payment']['name'];
        // $mri = $_FILES['mri']['name'];
        // $document =  $name.'-'.$document1;

      try
      {
        move_uploaded_file($_FILES['payment']['tmp_name'], "payment/".$payment);
        // move_uploaded_file($_FILES['mri']['tmp_name'], "MRI/".$mri);
        
        $stmt = $conn->prepare("INSERT INTO tracker (lead, gender, pain_id, engagement_id, status, centers_id, payment, notes, created_date, user_id, created_by) VALUES  (:lead, :gender, :pain_id, :engagement_id, :status, :centers_id, :payment, :notes, :created_date, :user_id, :created_by)"); 

        
        $stmt->bindParam(':lead', $lead);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':pain_id', $pain_id);
        $stmt->bindParam(':engagement_id', $engagement_id);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':centers_id', $centers_id);
        $stmt->bindParam(':payment', $payment);
        $stmt->bindParam(':notes', $notes);
        $stmt->bindParam(':created_date', $created_date);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':created_by', $created_by);
    $stmt->execute();
      } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }

}
else if (isset($_POST["update"])){

        $user_id = $_POST["user_id"];
        $tracker_id = $_POST["tracker_id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $created_by = $_POST["created_by"];
        $lead = $_POST["lead"];    
        $gender= $_POST["gender"];
        $pain= $_POST["pain"];
        $engagement= $_POST["engagement"];
        $status= $_POST["status"];
        $branch= $_POST["branch"];
        $notes= $_POST["notes"];
        $created_date = date("Y/m/d");
        $payment = $_FILES['payment']['name'];
       

    if( $payment != ""){
        move_uploaded_file($_FILES['payment']['tmp_name'], "payment/".$payment);
   

        $sql = "UPDATE tracker SET lead = '$lead', gender = '$gender', pain_id = '$pain',  engagement_id = '$engagement', status = '$status', centers_id = '$branch', payment = '$payment', notes = '$notes' WHERE tracker_id = '$tracker_id'";
      
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
    // else if ($payment != "" || $mri != ""){
    //     if ($payment != ""){
    //                 move_uploaded_file($_FILES['payment']['tmp_name'], "payment/".$payment);
    //                 $sql = "UPDATE tracker SET lead = '$lead', phone = '$phone' , inquiring = '$inquiring', identification = '$identification', gender = '$gender', ic = '$ic', pain_id = '$pain', package_id = '$package', engagement_id = '$engagement', status = '$status', centers_id = '$branch', therapist = '$therapist', payment = '$payment' WHERE tracker_id = '$tracker_id'";
                  
    //               $query = $conn->prepare( $sql );
    //               if ($query == false) {
    //               print_r($conn->errorInfo());
    //               die ('Error Prepare');
    //               }
    //               $sth = $query->execute();
    //               if ($sth == false) {
    //               print_r($query->errorInfo());
    //               die ('Error Execute');
    //               }
    //     } else if ($mri != ""){
    //             move_uploaded_file($_FILES['mri']['tmp_name'], "MRI/".$mri);
                
    //             $sql = "UPDATE tracker SET lead = '$lead', phone = '$phone' , inquiring = '$inquiring', identification = '$identification', gender = '$gender', ic = '$ic', pain_id = '$pain', package_id = '$package', engagement_id = '$engagement', status = '$status', centers_id = '$branch', therapist = '$therapist', mri = '$mri' WHERE tracker_id = '$tracker_id'";
                  
    //               $query = $conn->prepare( $sql );
    //               if ($query == false) {
    //               print_r($conn->errorInfo());
    //               die ('Error Prepare');
    //               }
    //               $sth = $query->execute();
    //               if ($sth == false) {
    //               print_r($query->errorInfo());
    //               die ('Error Execute');
    //               }
    //     }
    // }
    else
    {
        $sql = "UPDATE tracker SET lead = '$lead', gender = '$gender', pain_id = '$pain', engagement_id = '$engagement', status = '$status', centers_id = '$branch', notes = '$notes' WHERE tracker_id = '$tracker_id'";
      
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

}

else if (isset($_POST["submitFUOne"])){
        echo $_POST["tracker_id"]."<br>";
        echo $_POST["FUOne"]."<br>";
        echo $_POST["status"]."<br>";
        
        $tracker_id = $_POST["tracker_id"];
        $FUOne = $_POST["FUOne"];
        $status = $_POST["status"];
        
        $sql = "UPDATE tracker SET status = '$status', FUOne = '$FUOne' WHERE tracker_id = '$tracker_id'";

      
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
          
          header("location:system-lead.php?message=<div class='alert alert-success'>update Success Follow Up</div>");    
     exit();
      
       
}

else if (isset($_POST["submitFUTwo"])){
        echo $_POST["tracker_id"]."<br>";
        echo $_POST["FUTwo"]."<br>";
        echo $_POST["status"]."<br>";
        
        $tracker_id = $_POST["tracker_id"];
        $FUTwo = $_POST["FUTwo"];
        $status = $_POST["status"];
        
        $sql = "UPDATE tracker SET status = '$status', FUTwo = '$FUTwo' WHERE tracker_id = '$tracker_id'";

      
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
          
          header("location:system-lead.php?message=<div class='alert alert-success'>update Success Follow Up</div>");    
     exit();
      
       
}

else if (isset($_POST["submitFUThree"])){
        echo $_POST["tracker_id"]."<br>";
        echo $_POST["FUThree"]."<br>";
        echo $_POST["status"]."<br>";
        
        $tracker_id = $_POST["tracker_id"];
        $FUThree = $_POST["FUThree"];
        $status = $_POST["status"];
        
        $sql = "UPDATE tracker SET status = '$status', FUThree = '$FUThree' WHERE tracker_id = '$tracker_id'";

      
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
          
          header("location:system-lead.php?message=<div class='alert alert-success'>update Success Follow Up</div>");    
     exit();
      
       
}
error_reporting(0);
header('Location: system-lead.php');
 
exit();
?>
