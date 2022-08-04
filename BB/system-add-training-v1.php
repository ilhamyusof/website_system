<?php
// Connecting to the database
ob_start();
include("system-connection.php");
include("system-session.php");
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
     
     if(isset($_POST["submit"])){

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
        $created_date = date("Y/m/d h:i:s");
        $status = "Open";
        
     try
      {
        
        $stmt = $conn->prepare("INSERT INTO training (subject, trainer, startdate, enddate, starttime, endtime, objective, organizer, status, user_id, created_date) VALUES  (:subject, :trainer, :startdate, :enddate, :starttime, :endtime, :objective, :organizer, :status, :user_id, :created_date)"); 

        
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':trainer', $trainer);
        $stmt->bindParam(':startdate', $startdate);
        $stmt->bindParam(':enddate', $enddate);
        $stmt->bindParam(':starttime', $starttime);
        $stmt->bindParam(':endtime', $endtime);
        $stmt->bindParam(':objective', $objective);
        $stmt->bindParam(':organizer', $organizer);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':created_date', $created_date);
    $stmt->execute();
      } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }

}
error_reporting(0);
header('Location: system-training.php');
exit();

?>