<?php
ob_start();
// Connecting to the database
include("connection.php");
include("session.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
  if (!isset($_SESSION['session'])) {
        header('Location: login.php');
        session_destroy();
    }

if(isset($_POST["submit"])){

        
        // $user_id = $_POST["user_id"];
        $name = $_POST["name"];
        $email = $_POST["email"];        
        $phone = $_POST["phone"];       
        $status = 'New';
        $created_date = date("Y/m/d");       
        $created_by = $_POST["created_by"];
        $created_name = $_POST["created_name"];

        function random_strings($length_of_string)
          {
           
              // String of all alphanumeric character
            //   $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
              $str_result = '0123456789';
           
              // Shuffle the $str_result and returns substring
              // of specified length
              return substr(str_shuffle($str_result),0, $length_of_string);
          }

        $voucher = 'GC'.'-'.random_strings(6);
        
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
            $mail->Username = 'inquiry@physiomobilemy.com'; 
            $mail->Password = 'pmmyinquiry4321'; 
            $mail->setFrom('inquiry@physiomobilemy.com', 'Physiomobile Malaysia');
            $mail->addAddress($email, $name);
           
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            $mail->addAttachment('GiftCard.jpg', 'Gift Card.jpg');    //Optional name
            
            //content
            $mail->isHTML(true); 
            $mail->Subject = "GIFT CARD (FREE 1 SESSION TREATMENT)";
            $mail->Body = "
            <html>
            <body>
                   
         
            <p> Dear <strong>$name</strong>;<br>
            <p> Congratulations ! </p>
            <p> You have be award with <strong> Gift Card </strong> voucher (Free 1 Session Treatment) by $created_name. Code voucher <strong> $voucher </strong>. You can redeem the voucher at any Physiomobile outlet near you.</p>
            <p>The process of redemption as below:</p>
            <p>1) Call or book through Physiomobile website for appointment booking.</p>
            <p>2) Choose your preferred date/ day & time.</p>
            <p>3) Show your email and digital voucher at the counter.</p>
            <p>4) Mention your name and phone number.</p>
            <p>5) Enjoy your Free 1 treatment session for 1 hour.</p><br>
            <p>Hope you enjoy and are happy with our service.</p>
            <p>For more detail please click our website <a href='https://physiomobile.com/system-login.php'>www.physiomobile.com</a> </p>
            
            <p>Thank you and best regards.</p>   
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
                
        $stmt = $conn->prepare("INSERT INTO giftcard (name, phone, email, status, voucher, created_date, created_by) VALUES  (:name, :phone, :email, :status, :voucher, :created_date, :created_by)"); 

        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':voucher', $voucher);
        $stmt->bindParam(':created_date', $created_date);
        $stmt->bindParam(':created_by', $created_by);        
    $stmt->execute();
      } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }
      
     header("location:system-giftcard-create.php?message=<div class='alert alert-success'>update Success Follow Up</div>");    
     exit();

}
// else if (isset($_POST["update"])){

//         $user_id = $_POST["user_id"];
//         $tracker_id = $_POST["tracker_id"];
//         $name = $_POST["name"];
//         $email = $_POST["email"];
//         $created_by = $_POST["created_by"];
//         $lead = $_POST["lead"];    
//         $gender= $_POST["gender"];
//         $pain= $_POST["pain"];
//         $engagement= $_POST["engagement"];
//         $status= $_POST["status"];
//         $branch= $_POST["branch"];
//         $notes= $_POST["notes"];
//         $created_date = date("Y/m/d");
//         $payment = $_FILES['payment']['name'];
       

    // if( $payment != ""){
    //     move_uploaded_file($_FILES['payment']['tmp_name'], "payment/".$payment);
   

    //     $sql = "UPDATE tracker SET lead = '$lead', gender = '$gender', pain_id = '$pain',  engagement_id = '$engagement', status = '$status', centers_id = '$branch', payment = '$payment', notes = '$notes' WHERE tracker_id = '$tracker_id'";
      
    //   $query = $conn->prepare( $sql );
    //   if ($query == false) {
    //    print_r($conn->errorInfo());
    //    die ('Error Prepare');
    //   }
    //   $sth = $query->execute();
    //   if ($sth == false) {
    //    print_r($query->errorInfo());
    //    die ('Error Execute');
    //   }
    // }
    
    // else
    // {
    //     $sql = "UPDATE tracker SET lead = '$lead', gender = '$gender', pain_id = '$pain', engagement_id = '$engagement', status = '$status', centers_id = '$branch', notes = '$notes' WHERE tracker_id = '$tracker_id'";
      
    //   $query = $conn->prepare( $sql );
    //   if ($query == false) {
    //    print_r($conn->errorInfo());
    //    die ('Error Prepare');
    //   }
    //   $sth = $query->execute();
    //   if ($sth == false) {
    //    print_r($query->errorInfo());
    //    die ('Error Execute');
    //   }
    // }

// }

else if (isset($_POST["redeem"])){
        echo $_POST["giftcard_id"]."<br>";
        echo $_POST["incharge"]."<br>";
        echo $_POST["status"]."<br>";
        
        $giftcard_id = $_POST["giftcard_id"];
        $incharge = $_POST["incharge"];
        $center_id = $_POST["center_id"];
        $status = 'Close'; 
        $redeem_date = date("Y/m/d");
        
        $sql = "UPDATE giftcard SET incharge = '$incharge',center_id = '$center_id',status = '$status', redeem_date = '$redeem_date' WHERE giftcard_id = '$giftcard_id'";

      
        $query = $conn->prepare( $sql );
          if ($query == false) {
            print_r($conn->errorInfo());
            die ('Error Prepare');
          }
        $sth = $query->execute();
          if ($sth == false) {
            print_r($query->errorInfo());
            die ('Error Execute');
          }
          
         header("location:system-giftcard.php?message=<div class='alert alert-success'>Success Redeem Voucher</div>");    
     exit();
      
       
}

// else if (isset($_POST["submitFUTwo"])){
//         echo $_POST["tracker_id"]."<br>";
//         echo $_POST["FUTwo"]."<br>";
//         echo $_POST["status"]."<br>";
        
//         $tracker_id = $_POST["tracker_id"];
//         $FUTwo = $_POST["FUTwo"];
//         $status = $_POST["status"];
        
//         $sql = "UPDATE tracker SET status = '$status', FUTwo = '$FUTwo' WHERE tracker_id = '$tracker_id'";

      
//         $query = $conn->prepare( $sql );
//           if ($query == false) {
//            print_r($conn->errorInfo());
//            die ('Error Prepare');
//           }
//         $sth = $query->execute();
//           if ($sth == false) {
//            print_r($query->errorInfo());
//            die ('Error Execute');
//           }
          
//           header("location:system-lead.php?message=<div class='alert alert-success'>update Success Follow Up</div>");    
//      exit();
      
       
// }

// else if (isset($_POST["submitFUThree"])){
//         echo $_POST["tracker_id"]."<br>";
//         echo $_POST["FUThree"]."<br>";
//         echo $_POST["status"]."<br>";
        
//         $tracker_id = $_POST["tracker_id"];
//         $FUThree = $_POST["FUThree"];
//         $status = $_POST["status"];
        
//         $sql = "UPDATE tracker SET status = '$status', FUThree = '$FUThree' WHERE tracker_id = '$tracker_id'";

      
//         $query = $conn->prepare( $sql );
//           if ($query == false) {
//            print_r($conn->errorInfo());
//            die ('Error Prepare');
//           }
//         $sth = $query->execute();
//           if ($sth == false) {
//            print_r($query->errorInfo());
//            die ('Error Execute');
//           }
          
//           header("location:system-lead.php?message=<div class='alert alert-success'>update Success Follow Up</div>");    
//      exit();
      
       
// }
error_reporting(0);
// header('Location: system-lead.php');
 
exit();
?>
