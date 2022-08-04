<?php
// Connecting to the database
include("system-connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// include("session.php");

//   if (!isset($_SESSION['session'])) {
//         header('Location: index.php');
//         session_destroy();
//     }
       echo $_POST["email"]."<br>";
//
if(isset($_POST["submit"])){

        
        $email = $_POST["email"];

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
            $mail->addAddress($email);
            $mail->addCC('inquiry@physiomobilemy.com');     // Add a recipient         
            // Content
            $mail->isHTML(true); 
            
            
            $mail->Subject = "Reset Password Notification";
            $mail->Body = "
				        <html>
			            <head>
							<style>
							.button {
							  background-color: #4CAF50;
							  border: none;
							  color: white;
							  padding: 15px 32px;
							  text-align: center;
							  text-decoration: none;
							  display: inline-block;
							  font-size: 16px;
							  margin: 4px 2px;
							  cursor: pointer;
							}
							</style>
						</head>
				        <body>
				            <p> Hello!,<br><br>
				          	<p>	You are receiving this email because we received a password reset request for your account.</p>

				         	<a href='http://localhost/clinic/assets-system/reset-password.php?id=<?php echo $email; ?>'><button type='button' class='button'>Reset Password</button></a>

				          	<p>This password reset link will expire in 60 minutes.</p>
				          	<p>If you did not request a password reset, no further action is required.</p>
				                        
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
    
      // try
      // { 
        
  //       $stmt = $conn->prepare("INSERT INTO inquiry (name, email, contact, branch, message, status, respond_date) VALUES  (:name, :email, :contact, :branch, :message, :status, :respond_date)");         
  //       $stmt->bindParam(':name', $name);
  //       $stmt->bindParam(':email', $email);       
  //       $stmt->bindParam(':contact', $contact);       
  //       $stmt->bindParam(':branch', $branch);       
  //       $stmt->bindParam(':message', $message);
  //       $stmt->bindParam(':status', $status);       
  //       $stmt->bindParam(':respond_date', $respond_date);
		// $stmt->execute();
          
  //       } catch(PDOException $e){
  //       $message = "ERROR : ".$e->getMessage();  
  //     }

}else{
     echo "message not send";
}
 header('Location: system-forgot-password.php');
?>