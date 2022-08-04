<?php
ob_start();
// Connecting to the database
include("system-connection.php");
include("system-session.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


  if (!isset($_SESSION['session'])) {
        header('Location: system-login.php');
        session_destroy();
    }

        echo $_POST["name"]."<br>";
        echo $_POST["maritial"]."<br>";
        echo $_POST["bod"]."<br>";
        echo $_POST["phone"]."<br>";
        echo $_POST["email"]."<br>";
        echo $_POST["address"]."<br>";
        echo $_POST["role"]."<br>";
        echo $_POST["branch"]."<br>"; 
        echo $_POST["department"]."<br>";
        echo $_POST["salary"]."<br>";
        echo $_POST["resignation"]."<br>";

if(isset($_POST["submit"])){

        
        $name = $_POST["name"];
        $maritial = $_POST["maritial"];
        // $bod1 = $_POST["bod"];
        //$bod = date("m-d-Y");
        $bod = date("Y-m-d");
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $roles_id = $_POST["role"];       
        $centers_id= $_POST["branch"];
        $department = $_POST["department"];
        $salary = $_POST["salary"];
        $resignation = $_POST["resignation"];
        $password = $phone;       
        $created_date = date("Y/m/d");
        $status= "Active";

        $image = $_FILES['image']['name'];

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
                       
         
            <p> Congratulations! You have already added in the Physiomobile Management System <br><br>

           I would like to inform that you have been registered in the physiomobile management system.
           <p>Below are the details of your information</p>

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
                            <td style='width:150px'><strong>Password: </strong></td>
                            <td style='width:400px'>$phone</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Date: </strong></td>
                            <td style='width:400px'>$created_date</td>
                        </tr>
                    </tbody>
            </table> 
            <br>
            Please click this link to login the system <a href='https://physiomobile.com/system-login.php'>www.physiomobile.com</a> 
           <br><br>

            Thank you.
            
            </p>
               <p>PHYSIOMOBILE ENRICHING QUALITY OF LIFE</p> 
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
        if ($roles_id == '8'){
            move_uploaded_file($_FILES['image']['tmp_name'], "img/".$image);
    
            $stmt = $conn->prepare("INSERT INTO therapist (name, maritial, bod,  email, phone, address, password, status, created_date, roles_id, centers_id, department, salary, resignation, image) VALUES  (:name, :maritial, :bod, :email, :phone, :address, :password, :status, :created_date, :roles_id, :centers_id, :department, :salary, :resignation, :image)"); 
            
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':maritial', $maritial);
            $stmt->bindParam(':bod', $bod);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':created_date', $created_date);        
            $stmt->bindParam(':roles_id', $roles_id);
            $stmt->bindParam(':centers_id', $centers_id);
            $stmt->bindParam(':department', $department);
            $stmt->bindParam(':salary', $salary);
            $stmt->bindParam(':resignation', $resignation);
            $stmt->bindParam(':image', $image);
    		$stmt->execute();
    		
    		$sql = $conn->prepare("INSERT INTO user (name, maritial, bod,  email, phone, address, password, status, created_date, roles_id, centers_id, department, salary, resignation, image) VALUES  (:name, :maritial, :bod, :email, :phone, :address, :password, :status, :created_date, :roles_id, :centers_id, :department, :salary, :resignation, :image)"); 
            
            $sql->bindParam(':name', $name);
            $sql->bindParam(':maritial', $maritial);
            $sql->bindParam(':bod', $bod);
            $sql->bindParam(':email', $email);
            $sql->bindParam(':phone', $phone);
            $sql->bindParam(':address', $address);
            $sql->bindParam(':password', $password);
            $sql->bindParam(':status', $status);
            $sql->bindParam(':created_date', $created_date);        
            $sql->bindParam(':roles_id', $roles_id);
            $sql->bindParam(':centers_id', $centers_id);
            $sql->bindParam(':department', $department);
            $sql->bindParam(':salary', $salary);
            $sql->bindParam(':resignation', $resignation);
            $sql->bindParam(':image', $image);
    		$sql->execute();
    		
        }else {
            
            
            move_uploaded_file($_FILES['image']['tmp_name'], "img/".$image);
    
            $stmt = $conn->prepare("INSERT INTO user (name, maritial, bod,  email, phone, address, password, status, created_date, roles_id, centers_id, department, salary, resignation, image) VALUES  (:name, :maritial, :bod, :email, :phone, :address, :password, :status, :created_date, :roles_id, :centers_id, :department, :salary, :resignation, :image)"); 
            
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':maritial', $maritial);
            $stmt->bindParam(':bod', $bod);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':created_date', $created_date);        
            $stmt->bindParam(':roles_id', $roles_id);
            $stmt->bindParam(':centers_id', $centers_id);
            $stmt->bindParam(':department', $department);
            $stmt->bindParam(':salary', $salary);
            $stmt->bindParam(':resignation', $resignation);
            $stmt->bindParam(':image', $image);
    		$stmt->execute();
          } 
          
          
      } catch(PDOException $e){
            $message = "ERROR : ".$e->getMessage();  
          }

}
 
header('Location: system-user.php');
exit();
?>