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
        $phone= $_POST["phone"];
        $inquiring= $_POST["inquiring"];
        $identification= $_POST["identification"];
        $gender= $_POST["gender"];
        $ic= $_POST["ic"];
        $pain_id= $_POST["pain"];
        $package_id= $_POST["package"];
        $engagement_id= $_POST["engagement"];
        $status= $_POST["status"];
        $centers_id= $_POST["branch"];
        $therapist_id= $_POST["therapist"];
        $created_date = date("Y/m/d");
        $payment = $_FILES['payment']['name'];
        $mri = $_FILES['mri']['name'];
        // $document =  $name.'-'.$document1;

      try
      {
        move_uploaded_file($_FILES['payment']['tmp_name'], "payment/".$payment);
        move_uploaded_file($_FILES['mri']['tmp_name'], "MRI/".$mri);
        
        $stmt = $conn->prepare("INSERT INTO tracker (lead, phone, inquiring, identification, gender, ic, pain_id, package_id,engagement_id, status, centers_id, therapist_id, payment, mri, created_date, user_id, created_by) VALUES  (:lead, :phone, :inquiring, :identification, :gender, :ic, :pain_id, :package_id,:engagement_id, :status, :centers_id, :therapist_id, :payment, :mri, :created_date, :user_id, :created_by)"); 

        
        $stmt->bindParam(':lead', $lead);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':inquiring', $inquiring);
        $stmt->bindParam(':identification', $identification);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':ic', $ic);
        $stmt->bindParam(':pain_id', $pain_id);
        $stmt->bindParam(':package_id', $package_id);
        $stmt->bindParam(':engagement_id', $engagement_id);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':centers_id', $centers_id);
        $stmt->bindParam(':therapist_id', $therapist_id);
        $stmt->bindParam(':payment', $payment);
        $stmt->bindParam(':mri', $mri);
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
        $phone= $_POST["phone"];
        $inquiring= $_POST["inquiring"];
        $identification= $_POST["identification"];
        $gender= $_POST["gender"];
        $ic= $_POST["ic"];
        $pain= $_POST["pain"];
        $package= $_POST["package"];
        $engagement= $_POST["engagement"];
        $status= $_POST["status"];
        $branch= $_POST["branch"];
        $therapist= $_POST["therapist"];
        $created_date = date("Y/m/d");
        $payment = $_FILES['payment']['name'];
        $mri = $_FILES['mri']['name'];

    if( $payment != "" && $mri != ""){
        move_uploaded_file($_FILES['payment']['tmp_name'], "payment/".$payment);
        move_uploaded_file($_FILES['mri']['tmp_name'], "MRI/".$mri);

        $sql = "UPDATE tracker SET lead = '$lead', phone = '$phone' , inquiring = '$inquiring', identification = '$identification', gender = '$gender', ic = '$ic', pain_id = '$pain', package_id = '$package', engagement_id = '$engagement', status = '$status', centers_id = '$branch', therapist = '$therapist', payment = '$payment', mri = '$mri' WHERE tracker_id = '$tracker_id'";
      
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
    }else if ($payment != "" || $mri != ""){
        if ($payment != ""){
                    move_uploaded_file($_FILES['payment']['tmp_name'], "payment/".$payment);
                    $sql = "UPDATE tracker SET lead = '$lead', phone = '$phone' , inquiring = '$inquiring', identification = '$identification', gender = '$gender', ic = '$ic', pain_id = '$pain', package_id = '$package', engagement_id = '$engagement', status = '$status', centers_id = '$branch', therapist = '$therapist', payment = '$payment' WHERE tracker_id = '$tracker_id'";
                  
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
        } else if ($mri != ""){
                move_uploaded_file($_FILES['mri']['tmp_name'], "MRI/".$mri);
                
                $sql = "UPDATE tracker SET lead = '$lead', phone = '$phone' , inquiring = '$inquiring', identification = '$identification', gender = '$gender', ic = '$ic', pain_id = '$pain', package_id = '$package', engagement_id = '$engagement', status = '$status', centers_id = '$branch', therapist = '$therapist', mri = '$mri' WHERE tracker_id = '$tracker_id'";
                  
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
    else
    {
        $sql = "UPDATE tracker SET lead = '$lead', phone = '$phone' , inquiring = '$inquiring', identification = '$identification', gender = '$gender', ic = '$ic', pain_id = '$pain', package_id = '$package', engagement_id = '$engagement', status = '$status', centers_id = '$branch', therapist = '$therapist' WHERE tracker_id = '$tracker_id'";
      
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
error_reporting(0);
header('Location: system-lead.php');
 
exit();
?>
