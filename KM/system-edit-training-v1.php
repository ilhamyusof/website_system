<?php
// Connecting to the database
ob_start();
include("system-connection.php");
include("session.php");

$message = "";
  if (!isset($_SESSION['session'])) {
        header('Location: system-login.php');
        session_destroy();
    }

        echo $_POST["name"]."<br>";
        echo $_POST["user_id"]."<br>";
        echo $_POST["createdby"]."<br>";
        echo $_POST["trainer"]."<br>";
        echo $_POST["subject"]."<br>";
        echo $_POST["startdate"]."<br>";
        echo $_POST["enddate"]."<br>";
        echo $_POST["starttime"]."<br>";
        echo $_POST["endtime"]."<br>";
        echo $_POST["objective"]."<br>";
        echo $_POST["organizer"]."<br>";
        echo $_POST["training_id"]."<br>";
       
if(isset($_POST["user_id"])){
        
        $name = $_POST["name"];
        $user_id = $_POST["user_id"];
        $createdby = $_POST["createdby"];
        $trainer = $_POST["trainer"];
        $subject = $_POST["subject"];
        $startdate = $_POST["startdate"];
        $enddate = $_POST["enddate"];
        $starttime = $_POST["starttime"];
        $endtime = $_POST["endtime"];
        $objective = $_POST["objective"];
        $organizer = $_POST["organizer"];
        $training_id = $_POST["training_id"];
        $created_date = date("Y/m/d h:i:s");
        // $status = "Open"; 
       
     
       $sql = "UPDATE training SET organizer = '$organizer', subject = '$subject' , trainer = '$trainer' , startdate = '$startdate', 
        enddate = '$enddate', starttime = '$starttime', endtime = '$endtime' , objective = '$objective'  WHERE training_id = '$training_id'";

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
header('Location: system-training.php');
exit();
?>