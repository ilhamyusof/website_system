<?php
// Connecting to the database
ob_start();
include("system-connection.php");
include("session.php");


  if (!isset($_SESSION['session'])) {
        header('Location: system-login.php');
        session_destroy();
    }

        echo $_POST["asigned"]."<br>";
        echo $_POST["endasigned"]."<br>";
        echo $_POST["designation"]."designation"."<br>";
        echo $_POST["status"]."<br>";
        echo $_POST["basic"]."<br>";
        echo $_POST["allowance"]."<br>";
        
if(isset($_POST["submit"])){

        
        $user_id = $_POST["user_id"];
        $asigned = $_POST["asigned"];
        $endasigned = $_POST["endasigned"];
        $roles_id = $_POST["designation"];
        $status = $_POST["status"];
        $basic = $_POST["basic"];
        $allowance = $_POST["allowance"];
        $created_date = date("Y/m/d h:i:s");
        
  //         $start = ('2021-08-06');
  // $end = ('2021-08-31');

  // $days_between = ceil(abs($end - $start) / 86400);
    $duration = (strtotime($endasigned) - strtotime($asigned)) / (60 * 60 * 24);
    echo $duration;
       
      try
      {
        
        
        $stmt = $conn->prepare("INSERT INTO employee_status (asigned, endasigned, duration, roles_id, user_id, status, basic, allowance, created_date) VALUES  (:asigned, :endasigned, :duration, :roles_id, :user_id, :status, :basic, :allowance, :created_date)"); 

        
        $stmt->bindParam(':asigned', $asigned);
        $stmt->bindParam(':endasigned', $endasigned);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':roles_id', $roles_id);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':basic', $basic);
        $stmt->bindParam(':allowance', $allowance);
        $stmt->bindParam(':created_date', $created_date);
		    $stmt->execute();

        $sql2 = "UPDATE user SET roles_id = '$roles_id', salary = '$basic', resignation = '$asigned' WHERE user_id = '$user_id'";

        $query = $conn->prepare( $sql2 );
        if ($query == false) {
         print_r($conn->errorInfo());
         die ('Error Prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
         print_r($query->errorInfo());
         die ('Error Execute');
        }



      } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }

}
 
header('Location: system-user-view.php?id='.$user_id);
exit();
?>