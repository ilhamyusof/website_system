<?php
// Connecting to the database
ob_start();
// Connecting to the database
include("system-connection.php");
include("system-session.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$message = "";
  // if (!isset($_SESSION['session'])) {
  //       header('Location: insert-career.php');
  //       session_destroy();
  //   }


      
       
       

if(isset($_POST["submit"])){

        $now = date("Y/m/d H:m:s"); 
        $job_id = $_POST["job_id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $position = $_POST["position"];
        $centers_id = $_POST["location"];
        $resume1 = $_FILES['resume']['name'];
        $resume =  $name.'-'.$resume1;
        $respond_date = $now; 
        $status ='New';  

        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';
        
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);  
         try {
            $mail->SMTPDebug =0; // for detailed debug output
            $mail->isSMTP();
            $mail->Host = 'smtp.googlemail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            // $mail->Username = 'career.physiomobile@gmail.com'; 
            // $mail->Password = 'careerpmmy4321'; 
            $mail->Username = 'inquiry@physiomobilemy.com'; 
            $mail->Password = 'pmmyinquiry4321';
            // $mail->setFrom('career.physiomobile@gmail.com', 'Physiomobile Malaysia');
            $mail->setFrom('inquiry@physiomobilemy.com', 'Physiomobile Malaysia');
            $mail->addAddress($email, $name);
            $mail->addCC('career.physiomobile@gmail.com');     // Add a recipient         
            // Content
            $mail->isHTML(true); 
           
            
            $mail->Subject = "Job Application For $position";
            $mail->Body = "
            <html>
            <body>
                   
         
            <p> Thank you <strong>$name</strong>. We have safely acquired your job application for <strong>$position</strong>.<br>

            <p>We appreciate you contacting us, and please be patient as our Human Resource and respective Departments go through your application. We will contact you as soon as possible.</p>
            <p>Feel free to reply to this email for follow-up or to give suggestions.</p>

            <p>If you have a general question regarding Physiomobile, please check our website through <a href='https://physiomobile.com/'>www.physiomobile.com</a> and head on over to the FAQ section.</p>
            <p>We hope to meet you very soon</p>
            <p>Thank you and best regards,</p>
                
            </body>
        </html>
            ";
       
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }     
     
try
      {
        
        move_uploaded_file($_FILES['resume']['tmp_name'], "resume/".$resume);

        $stmt = $conn->prepare("INSERT INTO career (name, email, contact, position, resume, respond_date, status, job_id, centers_id) VALUES  (:name, :email, :contact, :position, :resume, :respond_date, :status, :job_id, :centers_id)");
        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);       
        $stmt->bindParam(':contact', $contact);
        $stmt->bindParam(':position', $position); 
        $stmt->bindParam(':resume', $resume);       
        $stmt->bindParam(':respond_date', $respond_date);
        $stmt->bindParam(':status', $status);       
        $stmt->bindParam(':job_id', $job_id);
        $stmt->bindParam(':centers_id', $centers_id);
        $stmt->execute();
          } catch(PDOException $e){
            $message = "ERROR : ".$e->getMessage();  
          }

}else{
     echo "message not send";
}

// header('Location: https://physiomobile.com.my/detail-job.php?id='.$job_id);
 header('Location: https://physiomobile.com/submitform.php');

exit();
?>