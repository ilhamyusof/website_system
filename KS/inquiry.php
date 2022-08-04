<?php
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
       echo $_POST["services"]."<br>";
       echo $_POST["company"]."<br>";
       list($centers_id, $outlet) = explode("-", $_POST['branch'], 2);
       echo $outlet."<br>";
       echo $centers_id."<br>";
       $now = date("Y/m/d H:m:s");
       $today = date("Y/m/d");
//
if(isset($_POST["submit"])){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        // $branch = $_POST["branch"];
        $message = $_POST["message"];
        $services = $_POST["services"];
        $address = $_POST["address"];
        $respond_date = $today;   
        $now = date("Y/m/d H:m:s");
        $time2 = date("Ymdhis");
        $status = 'New';
        list($centers_id, $outlet) = explode("-", $_POST['branch'], 2);
        $branch = $centers_id;

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

            We have received your details and will get back to you shortly.</p>
          
           <p>If you have general questions about Physiomobile, you are welcome to visit our website at  <a href='https://physiomobile.com/'>www.physiomobile.com</a></p> 

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
                            <td style='width:150px'><strong>branch selected: </strong></td>
                            <td style='width:400px'>$outlet</td>
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
        
        $stmt = $conn->prepare("INSERT INTO inquiry (name, email, contact, services, address,  branch, message, status, respond_date) VALUES  (:name, :email, :contact, :services, :address, :branch, :message, :status, :respond_date)");         
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);       
        $stmt->bindParam(':contact', $contact); 
        $stmt->bindParam(':services', $services);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':branch', $branch);       
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':status', $status);       
        $stmt->bindParam(':respond_date', $respond_date);
        $stmt->execute();
          
        } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }
       header('Location: appointment.php');

} else if (isset($_POST["save"])){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $branch = $_POST["branch"];
        $message = $_POST["message"];
        $services = $_POST["services"];
        $address = $_POST["address"];
        $respond_date = $today;   
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

            We have received your details and will get back to you shortly.</p>
          
           <p>If you have general questions about Physiomobile, you are welcome to visit our website at  <a href='https://physiomobile.com/'>www.physiomobile.com</a></p> 

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
        
        $stmt = $conn->prepare("INSERT INTO inquiry (name, email, contact, services, address,  branch, message, status, respond_date) VALUES  (:name, :email, :contact, :services, :address, :branch, :message, :status, :respond_date)");         
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);       
        $stmt->bindParam(':contact', $contact); 
        $stmt->bindParam(':services', $services);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':branch', $branch);       
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':status', $status);       
        $stmt->bindParam(':respond_date', $respond_date);
        $stmt->execute();
          
        } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }
    //   header('Location: appointment_v1.php');
    //   header('Location: https://physiomobile.com.my/appointment_v1.php');
      header('Location: https://physiomobile.com/submitform.php');
 exit();
 
} else if (isset($_POST["save-1"])){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $branch = $_POST["branch"];
        $message = $_POST["message"];
        
        $respond_date = $today;   
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
          
           <p>If you have general questions about Physiomobile, you are welcome to visit our website at  <a href='https://physiomobile.com/'>www.physiomobile.com</a></p> 

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
        
        $stmt = $conn->prepare("INSERT INTO inquiry (name, email, contact, branch, message, status, respond_date) VALUES  (:name, :email, :contact, :branch, :message, :status, :respond_date)");         
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contact', $contact); 
        $stmt->bindParam(':branch', $branch);       
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':status', $status);       
        $stmt->bindParam(':respond_date', $respond_date);
        $stmt->execute();
          
        } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }
    //   header('Location: appointment_v2.php');
    //   header('Location: https://physiomobile.com.my/appointment_v2.php');
    header('Location: https://physiomobile.com/submitform.php');
 exit();
 
} else if (isset($_POST["save-2"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $branch = $_POST["branch"];
        $message = $_POST["message"];
        $services = $_POST["services"];
        $address = $_POST["address"];
        $respond_date = $today;   
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
          
           <p>If you have general questions about Physiomobile, you are welcome to visit our website at  <a href='https://physiomobile.com/'>www.physiomobile.com</a></p> 

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
        
        $stmt = $conn->prepare("INSERT INTO inquiry (name, email, contact, branch, message, status, respond_date) VALUES  (:name, :email, :contact, :branch, :message, :status, :respond_date)");         
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);       
        $stmt->bindParam(':contact', $contact);         
        $stmt->bindParam(':branch', $branch);       
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':status', $status);       
        $stmt->bindParam(':respond_date', $respond_date);
        $stmt->execute();
          
        } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }
    //   header('Location: appointment_v3.php');
    //   header('Location: https://physiomobile.com.my/appointment_v3.php');
       header('Location: https://physiomobile.com/submitform.php');
 exit();
 
 
} else if (isset($_POST["save-3"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $branch = $_POST["branch"];
        $message = $_POST["message"];
        $services = $_POST["services"];
        $address = $_POST["address"];
        $respond_date = $today;   
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
          
           <p>If you have general questions about Physiomobile, you are welcome to visit our website at  <a href='https://physiomobile.com/'>www.physiomobile.com</a></p> 

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
        
        $stmt = $conn->prepare("INSERT INTO inquiry (name, email, contact, branch, message, status, respond_date) VALUES  (:name, :email, :contact, :branch, :message, :status, :respond_date)");         
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);       
        $stmt->bindParam(':contact', $contact); 
        $stmt->bindParam(':branch', $branch);       
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':status', $status);       
        $stmt->bindParam(':respond_date', $respond_date);
        $stmt->execute();
          
        } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }
    //   header('Location: appointment_v4.php'); 
       
    //   header('Location: https://physiomobile.com.my/appointment_v4.php');
    header('Location: https://physiomobile.com/submitform.php');
 exit();
       
} else if (isset($_POST["save-4"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $branch = $_POST["branch"];
        $message = $_POST["message"];
        $services = $_POST["services"];
        $address = $_POST["address"];
        $respond_date = $today;   
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
          
           <p>If you have general questions about Physiomobile, you are welcome to visit our website at  <a href='https://physiomobile.com/'>www.physiomobile.com</a></p> 

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
        
        $stmt = $conn->prepare("INSERT INTO inquiry (name, email, contact, branch, message, status, respond_date) VALUES  (:name, :email, :contact, :branch, :message, :status, :respond_date)");        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);       
        $stmt->bindParam(':contact', $contact); 
        $stmt->bindParam(':branch', $branch);       
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':status', $status);       
        $stmt->bindParam(':respond_date', $respond_date);
        $stmt->execute();
          
        } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }
    //   header('Location: appointment_v5.php');
    //   header('Location: https://physiomobile.com.my/appointment_v5.php');
    header('Location: https://physiomobile.com/submitform.php');
 exit();
 
} else if (isset($_POST["save-5"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $branch = $_POST["branch"];
        $message = $_POST["message"];
        $services = $_POST["services"];
        $address = $_POST["address"];
        $respond_date = $today;   
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
          
           <p>If you have general questions about Physiomobile, you are welcome to visit our website at  <a href='https://physiomobile.com/'>www.physiomobile.com</a></p> 

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
        
        $stmt = $conn->prepare("INSERT INTO inquiry (name, email, contact, branch, message, status, respond_date) VALUES  (:name, :email, :contact, :branch, :message, :status, :respond_date)");        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);       
        $stmt->bindParam(':contact', $contact); 
        $stmt->bindParam(':branch', $branch);       
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':status', $status);       
        $stmt->bindParam(':respond_date', $respond_date);
        $stmt->execute();
          
        } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }
    //   header('Location: appointment_v6.php');
    //   header('Location: https://physiomobile.com.my/appointment_v6.php');
    header('Location: https://physiomobile.com/submitform.php');
 exit();
 
} else if (isset($_POST["save-6"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $branch = $_POST["branch"];
        $message = $_POST["message"];
        $services = $_POST["services"];
        $address = $_POST["address"];
        $respond_date = $today;   
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
          
           <p>If you have general questions about Physiomobile, you are welcome to visit our website at  <a href='https://physiomobile.com/'>www.physiomobile.com</a></p> 

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
        
        $stmt = $conn->prepare("INSERT INTO inquiry (name, email, contact, branch, message, status, respond_date) VALUES  (:name, :email, :contact, :branch, :message, :status, :respond_date)");        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);       
        $stmt->bindParam(':contact', $contact); 
        $stmt->bindParam(':branch', $branch);       
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':status', $status);       
        $stmt->bindParam(':respond_date', $respond_date);
        $stmt->execute();
          
        } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }
    //   header('Location: appointment_v7.php');
    //   header('Location: https://physiomobile.com.my/appointment_v7.php');
    header('Location: https://physiomobile.com/submitform.php');
 exit();
 
} else if (isset($_POST["save-8"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $message = $_POST["message"];
        list($centers_id, $outlet) = explode("-", $_POST['branch'], 2);
        $branch = $centers_id;
        $respond_date = $today;   
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
          
           <p>If you have general questions about Physiomobile, you are welcome to visit our website at  <a href='https://physiomobile.com/'>www.physiomobile.com</a></p> 

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
                            <td style='width:150px'><strong>branch selected: </strong></td>
                            <td style='width:400px'>$outlet</td>
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
        
        $stmt = $conn->prepare("INSERT INTO inquiry (name, email, contact, branch, message, status, respond_date) VALUES  (:name, :email, :contact, :branch, :message, :status, :respond_date)");        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);       
        $stmt->bindParam(':contact', $contact); 
        $stmt->bindParam(':branch', $branch);       
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':status', $status);       
        $stmt->bindParam(':respond_date', $respond_date);
        $stmt->execute();
          
        } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }
    //   header('Location: appointment_v7.php');
    //   header('Location: https://physiomobile.com.my/appointment_v7.php');
    header('Location: https://physiomobile.com/submitform.php');
 exit();
 
} else if (isset($_POST["save-9"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $message = $_POST["message"];
        $package = $_POST["package"];
        list($centers_id, $outlet) = explode("-", $_POST['branch'], 2);
        $branch = $centers_id;
        $respond_date = $today;   
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
          
           <p>If you have general questions about Physiomobile, you are welcome to visit our website at  <a href='https://physiomobile.com/'>www.physiomobile.com</a></p> 

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
                            <td style='width:150px'><strong>branch selected: </strong></td>
                            <td style='width:400px'>$outlet</td>
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
        
        $stmt = $conn->prepare("INSERT INTO inquiry (name, email, contact, branch, message, status, package, respond_date) VALUES  (:name, :email, :contact, :branch, :message, :status, :package, :respond_date)");        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);       
        $stmt->bindParam(':contact', $contact); 
        $stmt->bindParam(':branch', $branch);       
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':package', $package);
        $stmt->bindParam(':status', $status);       
        $stmt->bindParam(':respond_date', $respond_date);
        $stmt->execute();
          
        } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }
    //   header('Location: appointment_v7.php');
    //   header('Location: https://physiomobile.com.my/appointment_v7.php');
    header('Location: https://physiomobile.com/submitform.php');
 exit();
 
} else if (isset($_POST["save-7"])){
    $name = $_POST["name"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $branch = $_POST["branch"];
        $message = $_POST["message"];
        $services = $_POST["services"];
        $address = $_POST["address"];
        $respond_date = $today;   
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
          
           <p>If you have general questions about Physiomobile, you are welcome to visit our website at  <a href='https://physiomobile.com/'>www.physiomobile.com</a></p> 

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
        
        $stmt = $conn->prepare("INSERT INTO inquiry (name, email, contact, branch, message, status, respond_date) VALUES  (:name, :email, :contact, :branch, :message, :status, :respond_date)");          
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);       
        $stmt->bindParam(':contact', $contact); 
        $stmt->bindParam(':branch', $branch);       
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':status', $status);       
        $stmt->bindParam(':respond_date', $respond_date);
        $stmt->execute();
          
        } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }
    //   header('Location: appointment_v8.php');
    //   header('Location: https://physiomobile.com.my/appointment_v8.php');
       header('Location: https://physiomobile.com.my/submitform.php');
 exit();

} else if (isset($_POST["save-paw"])){
        
        $name = $_POST["name"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $company = $_POST["company"];
        $now = date("Y/m/d H:m:s");
        $respond_date = $now;   
        $time2 = date("Ymdhis");
        $status = 'New';
        $subscribe = 'PAW';

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
            $mail->addCC('bdevelopment.physiomobile@gmail.com');     // Add a recipient         
            // Content
            $mail->isHTML(true); 
            
            
            $mail->Subject = "RESPONDED PHYSIOMOBILE AT WORK";
            $mail->Body = "
            <html>
            <body>
                       
         
           <p style='text-align: justify;'> THANKS, WE GOT YOUR DETAIL,<br><br>

           We received your details and will get back to you shortly and don’t worry our physiomobile team will respond to you as soon as possible.</p>
           <p style='text-align: justify;'>If you have general questions about our treatment or center, check out our website on <a href='https://physiomobile.com/'>www.physiomobile.com</a>&nbsp;for a walkthrough and answers FAQ</p> 

           <p style='text-align: justify;'>If you have any additional information that you think will help us to assist you, please feel free to reply to this email.</p>

            <table style='width:600px;'>
                    <tbody>
                        <tr>
                            <td style='width:150px'><strong>Name: </strong></td>
                            <td style='width:400px'>$name</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Email: </strong></td>
                            <td style='width:400px'>$email</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Contact Number: </strong></td>
                            <td style='width:400px'>$contact</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Company Name: </strong></td>
                            <td style='width:400px'>$company</td>
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
            <br>
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
        
        $stmt = $conn->prepare("INSERT INTO corporate (name, email, contact, company , status, subscribe, respond_date) VALUES  (:name, :email, :contact, :company, :status, :subscribe, :respond_date)");        
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
    header('Location: https://physiomobile.com/submitform.php');
 exit();
   
    

} else if (isset($_POST["save-hrdf"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $company = $_POST["company"];
        $respond_date = $today;   
        $now = date("Y/m/d H:m:s");
        $time2 = date("Ymdhis");
        $status = 'New';
        $subscribe = 'HRDF';

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
            $mail->addCC('bdevelopment.physiomobile@gmail.com');     // Add a recipient         
            // Content
            $mail->isHTML(true); 
            
            
            $mail->Subject = "RESPONDED HRDF TRAINING";
            $mail->Body = "
            <html>
            <body>
                       
         
           <p> THANKS, WE GOT YOUR DETAIL,<br><br>

           We received your details and will get back to you shortly and don’t worry our physiomobile team will respond to you as soon as possible.</p>
           <p>If you have general questions about our treatment or center, check out our website on <a href='https://physiomobile.com/'>www.physiomobile.com</a> &nbsp; for a walkthrough and answers FAQ</p> 

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
                            <td style='width:150px'><strong>Contact Number: </strong></td>
                            <td style='width:400px'>$contact</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Company Name: </strong></td>
                            <td style='width:400px'>$company</td>
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
        
        $stmt = $conn->prepare("INSERT INTO corporate (name, email, contact, company , status, subscribe, respond_date) VALUES  (:name, :email, :contact, :company, :status, :subscribe, :respond_date)");        
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
    header('Location: https://physiomobile.com/submitform.php');
 exit();
   
    
  
    

    
    

} else if (isset($_POST["save-sme"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $company = $_POST["company"];
        $respond_date = $today;   
        $now = date("Y/m/d H:m:s");
        $time2 = date("Ymdhis");
        $status = 'New';
        $subscribe = 'SME';

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
            $mail->addCC('bdevelopment.physiomobile@gmail.com');     // Add a recipient         
            // Content
            $mail->isHTML(true); 
            
            
            $mail->Subject = "RESPONDED PHYSIOMOBILE SME PRIHATIN";
            $mail->Body = "
            <html>
            <body>
                       
         
           <p> THANKS, WE GOT YOUR DETAIL,<br><br>

           We received your details and will get back to you shortly and don’t worry our physiomobile team will respond to you as soon as possible.</p>
           <p>If you have general questions about our treatment or center, check out our website on <a href='https://physiomobile.com/'>www.physiomobile.com</a> &nbsp; for a walkthrough and answers FAQ</p> 

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
                            <td style='width:150px'><strong>Contact Number: </strong></td>
                            <td style='width:400px'>$contact</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Company Name: </strong></td>
                            <td style='width:400px'>$company</td>
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
        
        $stmt = $conn->prepare("INSERT INTO corporate (name, email, contact, company , status, subscribe, respond_date) VALUES  (:name, :email, :contact, :company, :status, :subscribe, :respond_date)");        
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
    header('Location: https://physiomobile.com/submitform.php');
 exit();
   
}

else{
     echo "message not send";
}
header('Location: https://physiomobile.com/appointment.php');
 exit();

?>