<?php
// Connecting to the database
ob_start();
//Start session
    session_start();
include("connection.php");
include("session.php");

$message = "";
  if (!isset($_SESSION['session'])) {
        header('Location: system-login.php');
        exit();
        session_destroy();
    }

       

        
         
         
        $user_id = $_POST["user_id"];
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $bod= $_POST["bod"];
        $address= $_POST["address"];
        $department= $_POST["department"];
        $maritial= $_POST["maritial"];
        $image = $_FILES['image']['tmp_name'];
        
       
        
     if($image == ''){  
         
       $sql = "UPDATE user SET name = '$name', maritial = '$maritial', bod = '$bod' , phone = '$phone', address = '$address' WHERE user_id = '$user_id'";
      
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
      
      header("location:system-profile.php?message=<div class='alert alert-success'>update Success without image</div>");
       exit();

} else{
        move_uploaded_file($_FILES['image']['tmp_name'], "img/".$image);
  
        $sql = "UPDATE user SET name = '$name', maritial = '$maritial', bod = '$bod' , phone = '$phone', address = '$address', image = '$image' WHERE user_id = '$user_id'";
        
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
      
      header("location:system-profile.php?message=<div class='alert alert-success'>update Success with image</div>");
       exit();
       
}

?>