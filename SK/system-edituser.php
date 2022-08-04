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

        echo $_POST["user_id"]."<br>";
        echo $_POST["name"]."<br>";
        echo $_POST["phone"]."<br>";
        echo $_POST["email"]."<br>";
        echo $_POST["role"]."<br>";
        echo $_POST["branch"]."<br>"; 
       
if(isset($_POST["user_id"])){
        
         
         
        $user_id = $_POST["user_id"];
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $roles_id = $_POST["role"];       
        $centers_id= $_POST["branch"];
        $status= $_POST["status"];
        $bod= $_POST["bod"];
        $address= $_POST["address"];
        $department= $_POST["department"];
        $salary= $_POST["salary"];
        $resignation= $_POST["resignation"];
        $maritial= $_POST["maritial"];
        // $password = $phone;    
        // $status= "Active"; 
       
     
       $sql = "UPDATE user SET name = '$name', maritial = '$maritial', bod = '$bod' ,email = '$email' , phone = '$phone', address = '$address' , status = '$status', 
        roles_id = '$roles_id', centers_id = '$centers_id', department = '$department', salary = '$salary', resignation = '$resignation'  WHERE user_id = '$user_id'";
      
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

} else{
  echo "cannot save";
}
header('Location: system-usermanagement.php');
exit();
?>