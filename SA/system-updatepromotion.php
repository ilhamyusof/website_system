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
        session_destroy();
    }

        echo $_POST["promotion_id"]."<br>";
        echo $_POST["title"]."<br>";
        echo $_POST["description"]."<br>";
        echo $_POST["start_date"]."<br>";
        echo $_POST["end_date"]."<br>";

        $promotion_id = $_POST["promotion_id"];
        $title = $_POST["title"];
        $description = $_POST["description"];
        $start_date = $_POST["start_date"];
        $end_date = $_POST["end_date"];       
        $image1 = $_FILES['image']['name'];
        $image =  $title.'-'.$image1;

 if($image1 == ''){          
      $sql = "UPDATE promotion SET title = '$title', description = '$description', start_date = '$start_date', end_date = '$end_date' WHERE promotion_id = '$promotion_id'";
      
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


       header("location:system-promotion.php?message=<div class='alert alert-success'>update Success without image</div>");
       exit();

     

}else{
    
      move_uploaded_file($_FILES['image']['tmp_name'], "promotion/".$image);

      $sql = "UPDATE promotion SET title = '$title', description = '$description', start_date = '$start_date', end_date = '$end_date', image = '$image' WHERE promotion_id = '$promotion_id'";
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
    header("location:system-promotion.php?message=<div class='alert alert-success'>update Success</div>");
    exit();

}
?>