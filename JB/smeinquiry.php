<?php
// Connecting to the database
include("connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// include("session.php");

//   if (!isset($_SESSION['session'])) {
//         header('Location: index.php');
//         session_destroy();
//     }
       //     
       $now = date("Y/m/d H:m:s"); 

if(isset($_POST["submit"])){


        $companyname = $_POST["companyname"];
        $companyemail = $_POST["companyemail"];
        $companyphone = $_POST["companyphone"];
        $companybusiness = $_POST["companybusiness"];
        $companyaddress = $_POST["companyaddress"]; 
        // $chargename = $_POST["chargename"]."<br>"; 
        // $position = $_POST["position"]."<br>";
        // $phone = $_POST["phone"]."<br>";
        // $email = $_POST["email"]."<br>";
        $respond_date = $now;   
        $now = date("Y/m/d H:m:s");
            $time2 = date("Ymdhis");
        $status = 'New';  

        $emailchargename = $companyemail;
        
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
            $mail->Username = 'inquiry@physiomobilemy.com'; // YOUR gmail email
            $mail->Password = 'pmmyinquiry4321'; // YOUR gmail password
            //Recipients
            $mail->setFrom('inquiry@physiomobilemy.com', 'Physiomobile Malaysia');
            $mail->addAddress($emailchargename, $companyname);
            // $mail->addCC('inquiry@physiomobilemy.com');     // Add a recipient         
            // Content
            $mail->isHTML(true); 
            
            
            $mail->Subject = "Apply Join SME Prihatin";
            $mail->Body = "
            <html>
            <body>
                       
         
            <p> THANKS, WE GOT YOUR DETAIL,<br><br>

           We received your details and will get back to you shortly and don’t worry our physiomobile team will respond to you as soon as possible.</p>
           <p>If you have general questions about our treatment or center, check out our website on <a href='https://physiomobile.my/'>www.physiomobile.my</a> &nbsp; for a walkthrough and answers FAQ</p> 

           <p>If you have any additional information that you think will help us to assist you, please feel free to reply to this email.</p>

            
            
           <br><br>

            Thank you.
            
            </p>
                
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
        
        $stmt = $conn->prepare("INSERT INTO sme (companyname, companyemail, companyphone, companybusiness, companyaddress, status, respond_date) VALUES  (:companyname, :companyemail, :companyphone, :companybusiness, :companyaddress, :status, :respond_date)");         
        $stmt->bindParam(':companyname', $companyname);
        $stmt->bindParam(':companyemail', $companyemail);       
        $stmt->bindParam(':companyphone', $companyphone);       
        $stmt->bindParam(':companybusiness', $companybusiness);       
        $stmt->bindParam(':companyaddress', $companyaddress);
        $stmt->bindParam(':status', $status);       
        $stmt->bindParam(':respond_date', $respond_date);
        $stmt->execute();
          
        } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }

}else{
     echo "message not send";
}
header("location:joinsme.php?message=<div class='alert alert-success'> Success </div>");
 
?>