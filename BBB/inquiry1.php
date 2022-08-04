<?php

ob_start();
include("connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

       echo $_POST["name"]."<br>";
       echo $_POST["email"]."<br>";
       echo $_POST["contact"]."<br>";
       echo $_POST["company"]."<br>";
       $now = date("Y/m/d H:m:s"); 

if(isset($_POST["save-paw"])){
        
        $name = $_POST["name"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $company = $_POST["company"];
        $now = date("Y/m/d H:m:s");
        $respond_date = '2022-04-04 11:56:22';   
        $time2 = date("Ymdhis");
        $status = 'New';
        $subscribe = 'PAW';
        
      try 
      { 
        $stmt = $conn->prepare("INSERT INTO corporate (name, email, contact, company , status, subscribe, respond_date) VALUES (:name, :email, :contact, :company, :status, :subscribe, :respond_date)");    
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);       
        $stmt->bindParam(':contact', $contact); 
        $stmt->bindParam(':company ', $company);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':subscribe', $subscribe);       
        $stmt->bindParam(':respond_date', $respond_date);
        $stmt->execute();
          
        } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }

}else{
     echo "message not send";
}
//  header('Location: appointment.php');
 exit();
?>