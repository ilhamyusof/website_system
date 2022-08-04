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
       echo $_POST["name"]."<br>";
       echo $_POST["email"]."<br>";
       echo $_POST["contact"]."<br>";
       echo $_POST["message"]."<br>";       
       $now = date("Y/m/d H:m:s"); 
//
if(isset($_POST["submit"])){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $message = $_POST["message"];
        $responded_date = $now;   
        $now = date("Y/m/d H:m:s");
        $time2 = date("Ymdhis");  

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
            // $mail->Username = 'qemalazmi@gmail.com'; // YOUR gmail email
            // $mail->Password = 'Qemalazmi1995'; // YOUR gmail password
             $mail->Username = 'inquiry@physiomobilemy.com'; 
            $mail->Password = 'pmmyinquiry4321'; 
            //Recipients
            //Recipients
            $mail->setFrom('inquiry@physiomobilemy.com', 'Physiomobile Malaysia');
            $mail->addAddress($email, $name);
            // $mail->addCC('inquiry@physiomobilemy.com');     // Add a recipient         
            // Content
            $mail->isHTML(true); 
           
            
            $mail->Subject = "FEEDBACK RESPONSE";
            $mail->Body = "
            <html>
            <body>
                   
         
            <p> Thanks ,We got your email.<br>

            <p>Thanks for contacting us, dont worry our team will assist and contact you as soon possible</p>
            <p>We apologize if our service does not exceed your expectation, feel free to give repy this email and give your suggestion so that we can improve our service and facility</p>

            <p>If you have general questions about our treatment or center, check out our website on <a href='https://physiomobile.my/'>www.physiomobile.my</a> &nbsp; for a walkthrough and answers FAQ</p>

            <p>Thank you</p>
                
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
        
        $stmt = $conn->prepare("INSERT INTO contactus (name, email, contact, message, responded_date) VALUES  (:name, :email, :contact, :message, :responded_date)");         
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);       
        $stmt->bindParam(':contact', $contact);    
        $stmt->bindParam(':message', $message);       
        $stmt->bindParam(':responded_date', $responded_date);
        $stmt->execute();
          
        } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }

}else{
     echo "message not send";
}
 header('Location: index.php');
?>