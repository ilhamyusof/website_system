<?php
ob_start();
// Connecting to the database
//Start session
    session_start();
include("connection.php");
include("session.php");

$message = "";
  if (!isset($_SESSION['session'])) {
        header('Location: system-login.php');
        session_destroy();
    }

        echo $_POST["id_department"]."<br>";
        echo $_POST["department"]."<br>";
        echo $_POST["category"]."<br>";
       
       

        $id_department = $_POST["id_department"];
        $department = $_POST["department"];
        $category = $_POST["category"];
        $image1 = $_FILES['image']['name'];
        $image =  $image1;

 if($image1 == ''){          
      $sql = "UPDATE department SET job_department = '$department', category = '$category' WHERE id_department = '$id_department'";
      
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


       header("location:system-lmspanel.php?message=<div class='alert alert-success'>update Success without image</div>");    
     exit();

}else{
    
      move_uploaded_file($_FILES['image']['tmp_name'], "department/".$image);

      $sql = "UPDATE department SET job_department = '$department', category = '$category', image = '$image' WHERE id_department = '$id_department'";
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
    header("location:system-lmspanel.php?message=<div class='alert alert-success'>update Success</div>");
    exit();
}
?>