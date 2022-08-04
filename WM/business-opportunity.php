<?php
// Connecting to the database
ob_start();
// Connecting to the database
include("system-connection.php");
include("system-session.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//   if (!isset($_SESSION['session'])) {
//         header('Location: index.php');
//         session_destroy();
//     }
      echo $_POST["name"]."<br>";
      echo $_POST["email"]."<br>";
      echo $_POST["phone"]."<br>";
      echo $_POST["location"]."<br>";
      echo $_POST["fund"]."<br>";     
      echo $_POST["investor"]."<br>";    
      
//
if(isset($_POST["submit"])){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $location = $_POST["location"];
        $fund = $_POST["fund"];
        $investor = $_POST["investor"];
        $respond_date = date("Y/m/d H:m:s");   
        $now = date("Y/m/d H:m:s");
        $time2 = date("Ymdhis");
        $status = 'New';  

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
            $mail->addAddress($email, $name);
            $mail->addCC('fuad.physiomobile@gmail.com');     // Add a recipient      
            $mail->addBCC('hq@physiomobilemy.com');   
            // Content
            $mail->isHTML(true); 
            
            
            $mail->Subject = "Registration Join Physiomobile";
            $mail->Body = "
            <html>
            <body>
                       
         
            <p> THANKS, WE GOT YOUR DETAIL,<br><br>

           We received your details and will get back to you shortly and don’t worry our physiomobile team will respond to you as soon as possible.</p>
           <p>If you have general questions about our treatment or center, check out our website on <a href='https://physiomobile.com.my/'>www.physiomobile.com.my</a> &nbsp; for a walkthrough and answers FAQ</p> 

           <p>If you have any additional information that you think will help us to assist you, please feel free to reply to this email.</p>

            <table style='width:600px;'>
                    <tbody>
                        <tr>
                            <td style='width:150px'><strong>Name: </strong></td>
                            <td style='width:400px'>$name</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Email ID: </strong></td>
                            <td style='width:400px'>$email</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>contact number: </strong></td>
                            <td style='width:400px'>$phone</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Location: </strong></td>
                            <td style='width:400px'>$location</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Funds: </strong></td>
                            <td style='width:400px'>$fund</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Type of Investor: </strong></td>
                            <td style='width:400px'>$investor</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Date: </strong></td>
                            <td style='width:400px'>$respond_date</td>
                        </tr>
                    </tbody>
            </table>
            
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
        
        $stmt = $conn->prepare("INSERT INTO business (name, email, phone, location, fund, investor, status, respond_date) VALUES  (:name, :email, :phone, :location, :fund, :investor, :status, :respond_date)");         
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);       
        $stmt->bindParam(':phone', $phone);       
        $stmt->bindParam(':location', $location);       
        $stmt->bindParam(':fund', $fund);
        $stmt->bindParam(':investor', $investor);
        $stmt->bindParam(':status', $status);       
        $stmt->bindParam(':respond_date', $respond_date);
        $stmt->execute();
          
        } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }

    }else{
         echo "message not send";
    }
 header('Location: business.php');
 exit();
?>