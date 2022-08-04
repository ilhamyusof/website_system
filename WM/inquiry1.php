<?php
// Connecting to the database
ob_start();
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
       echo $_POST["branch"]."<br>";
       echo $_POST["message"]."<br>";
       echo $_POST["package"]."<br>";       
       $now = date("Y/m/d H:m:s"); 
//
if(isset($_POST["submit"])){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $branch = $_POST["branch"];
        $message = $_POST["message"];
        $package = $_POST["package"];
        $services = $_POST["services"];
        $address = $_POST["address"];
        $respond_date = $now;   
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
            $mail->addCC('inquiry@physiomobilemy.com');     // Add a recipient         
            // Content
            $mail->isHTML(true); 
            
            
            $mail->Subject = "Responded Message";
            $mail->Body = "
            <html>
            <body>
                       
         
            <p> Thank You for your Interest in getting the best service with Physiomobile!<br><br>

            We have received your details and will get back to you shortly..</p>
          
           <p>If you have general questions about Physiomobile, you are welcome to visit our website at  <a href='https://physiomobile.com.my/'>www.physiomobile.com.my</a></p> 

           <p>If you have any additional information that needs us to promptly answer, please feel free to reply to this email.</p>

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
                            <td style='width:400px'>$contact</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Package Promotion: </strong></td>
                            <td style='width:400px'>$package</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>branch selected: </strong></td>
                            <td style='width:400px'>$branch</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>message: </strong></td>
                            <td style='width:400px'>$message</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Date: </strong></td>
                            <td style='width:400px'>$respond_date</td>
                        </tr>
                    </tbody>
            </table>
            
           <br><br>

             <p>Thank you again.</p>
            <p>Have a good day</p>
            <br><br>
            <p>PHYSIOMOBILE ENRICHING QUALITY OF LIFE</p>
            
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
        
        $stmt = $conn->prepare("INSERT INTO inquiry (name, email, contact, services, address, branch, message, status, package, respond_date) VALUES  (:name, :email, :contact, :services, :address, :branch, :message, :status, :package, :respond_date)");         
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);       
        $stmt->bindParam(':contact', $contact);
        $stmt->bindParam(':services', $services);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':branch', $branch);       
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':package', $package);       
        $stmt->bindParam(':respond_date', $respond_date);
        $stmt->execute();
          
        } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }

}else{
     echo "message not send";
}
 header('Location: appointment.php');
 exit();
?>