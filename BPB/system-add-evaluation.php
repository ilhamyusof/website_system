<?php
ob_start();
// Connecting to the database
include("system-connection.php");
include("session.php");



  if (!isset($_SESSION['session'])) {
        header('Location: system-login.php');
        session_destroy();
    }

        
if(isset($_POST["submit"])){
        
        $user_id = $_POST["user_id"];
        $centers_id = $_POST["centers_id"];
        $operation_id = $_POST["operation_id"];
        $reviewby = $_POST["reviewby"];
        $q1 = $_POST["q1"];
        $q2 = $_POST["q2"];
        $q3 = $_POST["q3"];
        $q4 = $_POST["q4"];
        $q5 = $_POST["q5"];
        $q6 = $_POST["q6"];
        $q7 = $_POST["q7"];
        $q8 = $_POST["q8"];
        $q9 = $_POST["q9"];
        $q10 = $_POST["q10"];
        $q11 = $_POST["q11"];
        $q12 = $_POST["q12"];
        $q13 = $_POST["q13"];
        $q14 = $_POST["q14"];
        $q15 = $_POST["q15"];
        $q16 = $_POST["q16"];
        $feedback = $_POST["feedback"];

        $created_date = date("Y/m/d h:i:s");
       
      try
      {
        $stmt = $conn->prepare("INSERT INTO evaluation (q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, q11, q12, q13, q14, q15, q16, feedback, user_id, centers_id, operation_id, reviewby, created_date ) VALUES  (:q1, :q2, :q3, :q4, :q5, :q6, :q7, :q8, :q9, :q10, :q11, :q12, :q13, :q14, :q15, :q16, :feedback, :user_id, :centers_id, :operation_id, :reviewby, :created_date)"); 
        
        $stmt->bindParam(':q1', $q1);
        $stmt->bindParam(':q2', $q2);
        $stmt->bindParam(':q3', $q3);
        $stmt->bindParam(':q4', $q4);
        $stmt->bindParam(':q5', $q5);
        $stmt->bindParam(':q6', $q6);
        $stmt->bindParam(':q7', $q7);
        $stmt->bindParam(':q8', $q8);
        $stmt->bindParam(':q9', $q9);
        $stmt->bindParam(':q10', $q10);
        $stmt->bindParam(':q11', $q11);
        $stmt->bindParam(':q12', $q12);
        $stmt->bindParam(':q13', $q13);
        $stmt->bindParam(':q14', $q14);
        $stmt->bindParam(':q15', $q15);
        $stmt->bindParam(':q16', $q16);
        $stmt->bindParam(':feedback', $feedback);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':centers_id', $centers_id);
        $stmt->bindParam(':operation_id', $operation_id);
        $stmt->bindParam(':reviewby', $reviewby);
        $stmt->bindParam(':created_date', $created_date);
        
		    $stmt->execute();
      } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }
      header('Location: system-user-operation-evaluation.php?id='.$operation_id);
    exit();
} else if (isset($_POST["sale"])){

        $user_id = $_POST["user_id"];
        $centers_id = $_POST["centers_id"];
        $sale_id = $_POST["sale_id"];
        $reviewby = $_POST["reviewby"];
        $q1 = $_POST["q1"];
        $q2 = $_POST["q2"];
        $q3 = $_POST["q3"];
        $q4 = $_POST["q4"];
        $q5 = $_POST["q5"];
        $q6 = $_POST["q6"];
        $q7 = $_POST["q7"];
        $q8 = $_POST["q8"];
        $q9 = $_POST["q9"];
        $q10 = $_POST["q10"];
        $q11 = $_POST["q11"];
        $q12 = $_POST["q12"];
        $q13 = $_POST["q13"];
        $q14 = $_POST["q14"];
        $q15 = $_POST["q15"];
        $q16 = $_POST["q16"];
        $feedback = $_POST["feedback"];

        $created_date = date("Y/m/d h:i:s");
       
      try
      {
        $stmt = $conn->prepare("INSERT INTO evaluation (q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, q11, q12, q13, q14, q15, q16, feedback, user_id, centers_id, sale_id, reviewby, created_date ) VALUES  (:q1, :q2, :q3, :q4, :q5, :q6, :q7, :q8, :q9, :q10, :q11, :q12, :q13, :q14, :q15, :q16, :feedback, :user_id, :centers_id, :sale_id, :reviewby, :created_date)"); 
        
        $stmt->bindParam(':q1', $q1);
        $stmt->bindParam(':q2', $q2);
        $stmt->bindParam(':q3', $q3);
        $stmt->bindParam(':q4', $q4);
        $stmt->bindParam(':q5', $q5);
        $stmt->bindParam(':q6', $q6);
        $stmt->bindParam(':q7', $q7);
        $stmt->bindParam(':q8', $q8);
        $stmt->bindParam(':q9', $q9);
        $stmt->bindParam(':q10', $q10);
        $stmt->bindParam(':q11', $q11);
        $stmt->bindParam(':q12', $q12);
        $stmt->bindParam(':q13', $q13);
        $stmt->bindParam(':q14', $q14);
        $stmt->bindParam(':q15', $q15);
        $stmt->bindParam(':q16', $q16);
        $stmt->bindParam(':feedback', $feedback);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':centers_id', $centers_id);
        $stmt->bindParam(':sale_id', $sale_id);
        $stmt->bindParam(':reviewby', $reviewby);
        $stmt->bindParam(':created_date', $created_date);
        
            $stmt->execute();
      } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }
      header('Location: system-user-operation-evaluation.php?id='.$sale_id);
    exit();
} else if (isset($_POST["administration"])){

        $user_id = $_POST["user_id"];
        $centers_id = $_POST["centers_id"];
        $administration_id = $_POST["administration_id"];
        $reviewby = $_POST["reviewby"];
        $q1 = $_POST["q1"];
        $q2 = $_POST["q2"];
        $q3 = $_POST["q3"];
        $q4 = $_POST["q4"];
        $q5 = $_POST["q5"];
        $q6 = $_POST["q6"];
        $q7 = $_POST["q7"];
        $q8 = $_POST["q8"];
        $q9 = $_POST["q9"];
        $q10 = $_POST["q10"];
        $q11 = $_POST["q11"];
        $q12 = $_POST["q12"];
        $q13 = $_POST["q13"];
        $q14 = $_POST["q14"];
        $q15 = $_POST["q15"];
        $q16 = $_POST["q16"];
        $feedback = $_POST["feedback"];

        $created_date = date("Y/m/d h:i:s");
       
      try
      {
        $stmt = $conn->prepare("INSERT INTO evaluation (q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, q11, q12, q13, q14, q15, q16, feedback, user_id, centers_id, administration_id, reviewby, created_date ) VALUES  (:q1, :q2, :q3, :q4, :q5, :q6, :q7, :q8, :q9, :q10, :q11, :q12, :q13, :q14, :q15, :q16, :feedback, :user_id, :centers_id, :administration_id, :reviewby, :created_date)"); 
        
        $stmt->bindParam(':q1', $q1);
        $stmt->bindParam(':q2', $q2);
        $stmt->bindParam(':q3', $q3);
        $stmt->bindParam(':q4', $q4);
        $stmt->bindParam(':q5', $q5);
        $stmt->bindParam(':q6', $q6);
        $stmt->bindParam(':q7', $q7);
        $stmt->bindParam(':q8', $q8);
        $stmt->bindParam(':q9', $q9);
        $stmt->bindParam(':q10', $q10);
        $stmt->bindParam(':q11', $q11);
        $stmt->bindParam(':q12', $q12);
        $stmt->bindParam(':q13', $q13);
        $stmt->bindParam(':q14', $q14);
        $stmt->bindParam(':q15', $q15);
        $stmt->bindParam(':q16', $q16);
        $stmt->bindParam(':feedback', $feedback);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':centers_id', $centers_id);
        $stmt->bindParam(':administration_id', $administration_id);
        $stmt->bindParam(':reviewby', $reviewby);
        $stmt->bindParam(':created_date', $created_date);
        
            $stmt->execute();
      } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }
      header('Location: system-user-operation-evaluation.php?id='.$administration_id);
      exit();
} else if (isset($_POST["customerservice"])){

        $user_id = $_POST["user_id"];
        $centers_id = $_POST["centers_id"];
        $customerservices_id = $_POST["customerservices_id"];
        $reviewby = $_POST["reviewby"];
        $q1 = $_POST["q1"];
        $q2 = $_POST["q2"];
        $q3 = $_POST["q3"];
        $q4 = $_POST["q4"];
        $q5 = $_POST["q5"];
        $q6 = $_POST["q6"];
        $q7 = $_POST["q7"];
        $q8 = $_POST["q8"];
        $q9 = $_POST["q9"];
        $q10 = $_POST["q10"];
        $q11 = $_POST["q11"];
        $q12 = $_POST["q12"];
        $q13 = $_POST["q13"];
        $q14 = $_POST["q14"];
        $q15 = $_POST["q15"];
        $q16 = $_POST["q16"];
        $q17 = $_POST["q17"];
        $q18 = $_POST["q18"];
        $q19 = $_POST["q19"];
        $q20 = $_POST["q20"];
        $q21 = $_POST["q21"];
        $q22 = $_POST["q22"];
        $q23 = $_POST["q23"];
        $q24 = $_POST["q24"];
        $q25 = $_POST["q25"];
        $q26 = $_POST["q26"];
        $q27 = $_POST["q27"];
        $q28 = $_POST["q28"];
        $q29 = $_POST["q29"];
        $q30 = $_POST["q30"];
        $q31 = $_POST["q31"];
        $q32 = $_POST["q32"];
        $q33 = $_POST["q33"];
        $q34 = $_POST["q34"];
        $q35 = $_POST["q35"];
        $q36 = $_POST["q36"];
        $feedback = $_POST["feedback"];

        $created_date = date("Y/m/d h:i:s");
       
      try
      {
        $stmt = $conn->prepare("INSERT INTO evaluation (q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, q11, q12, q13, q14, q15, q16, q17, q18, q19, q20, q21, q22, q23, q24, q25, q26 , q27, q28, q29, q30, q31, q32, q33, q34, q35, q36, feedback, user_id, centers_id, customerservices_id, reviewby, created_date ) VALUES (:q1, :q2, :q3, :q4, :q5, :q6, :q7, :q8, :q9, :q10, :q11, :q12, :q13, :q14, :q15, :q16, :q17, :q18, :q19, :q20, :q21, :q22, :q23, :q24, :q25, :q26 , :q27, :q28, :q29, :q30, :q31, :q32, :q33, :q34, :q35, :q36, :feedback, :user_id, :centers_id, :customerservices_id, :reviewby, :created_date)"); 
        
        $stmt->bindParam(':q1', $q1);
        $stmt->bindParam(':q2', $q2);
        $stmt->bindParam(':q3', $q3);
        $stmt->bindParam(':q4', $q4);
        $stmt->bindParam(':q5', $q5);
        $stmt->bindParam(':q6', $q6);
        $stmt->bindParam(':q7', $q7);
        $stmt->bindParam(':q8', $q8);
        $stmt->bindParam(':q9', $q9);
        $stmt->bindParam(':q10', $q10);
        $stmt->bindParam(':q11', $q11);
        $stmt->bindParam(':q12', $q12);
        $stmt->bindParam(':q13', $q13);
        $stmt->bindParam(':q14', $q14);
        $stmt->bindParam(':q15', $q15);
        $stmt->bindParam(':q16', $q16);
        $stmt->bindParam(':q17', $q17);
        $stmt->bindParam(':q18', $q18);
        $stmt->bindParam(':q19', $q19);
        $stmt->bindParam(':q20', $q20);
        $stmt->bindParam(':q21', $q21);
        $stmt->bindParam(':q22', $q22);
        $stmt->bindParam(':q23', $q23);
        $stmt->bindParam(':q24', $q24);
        $stmt->bindParam(':q25', $q25);
        $stmt->bindParam(':q26', $q26);
        $stmt->bindParam(':q27', $q27);
        $stmt->bindParam(':q28', $q28);
        $stmt->bindParam(':q29', $q29);
        $stmt->bindParam(':q30', $q30);
        $stmt->bindParam(':q31', $q31);
        $stmt->bindParam(':q32', $q32);
        $stmt->bindParam(':q33', $q33);
        $stmt->bindParam(':q34', $q34);
        $stmt->bindParam(':q35', $q35);
        $stmt->bindParam(':q36', $q36);
        $stmt->bindParam(':feedback', $feedback);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':centers_id', $centers_id);
        $stmt->bindParam(':customerservices_id', $customerservices_id);
        $stmt->bindParam(':reviewby', $reviewby);
        $stmt->bindParam(':created_date', $created_date);
        
            $stmt->execute();
      } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }
      header('Location: system-user-operation-evaluation.php?id='.$customerservices_id);
      exit();
}
else if (isset($_POST["evaluate"])){

        echo $user_id = $_POST["user_id"]."<br>";
        echo $centers_id = $_POST["centers_id"]."<br>";
        echo $customerservices_id = $_POST["customerservices_id"]."customerservices_id"."<br>";
        echo $reviewby = $_POST["reviewby"]."<br>";
        echo $q1 = $_POST["q1"]."q1"."<br>";
        echo $q2 = $_POST["q2"]."q2"."<br>";
        echo $q3 = $_POST["q3"]."q3"."<br>";
        echo $q4 = $_POST["q4"]."q4"."<br>";
        echo $q5 = $_POST["q5"]."q5"."<br>";
        echo $q6 = $_POST["q6"]."q6"."<br>";
        echo $q7 = $_POST["q7"]."q7"."<br>";
        echo $q8 = $_POST["q8"]."q8"."<br>";
        echo $q9 = $_POST["q9"]."q9"."<br>";
        echo $q10 = $_POST["q10"]."q10"."<br>";
        echo $q11 = $_POST["q11"]."q11"."<br>";
        echo $q12 = $_POST["q12"]."q12"."<br>";
        echo $q13 = $_POST["q13"]."q13"."<br>";
        echo $q14 = $_POST["q14"]."q14"."<br>";
        echo $q15 = $_POST["q15"]."q15"."<br>";
        echo $q16 = $_POST["q16"]."q16"."<br>";
        echo $q17 = $_POST["q17"]."q17"."<br>";
        echo $q18 = $_POST["q18"]."q18"."<br>";
        echo $q19 = $_POST["q19"]."q19"."<br>";
        echo $q20 = $_POST["q20"]."q20"."<br>";
        echo $q21 = $_POST["q21"]."q21"."<br>";
        echo $q22 = $_POST["q22"]."q22"."<br>";
        echo $q23 = $_POST["q23"]."q23"."<br>";
        echo $q24 = $_POST["q24"]."q24"."<br>";
        echo $q25 = $_POST["q25"]."q25"."<br>";
        echo $q26 = $_POST["q26"]."q26"."<br>";
        echo $q27 = $_POST["q27"]."q27"."<br>";
        echo $q28 = $_POST["q28"]."q28"."<br>";
        echo $q29 = $_POST["q29"]."q29"."<br>";
        echo $q30 = $_POST["q30"]."q30"."<br>";
        echo $q31 = $_POST["q31"]."q31"."<br>";
        echo $q32 = $_POST["q32"]."q32"."<br>";
        echo $q33 = $_POST["q33"]."q33"."<br>";
        echo $q34 = $_POST["q34"]."q34"."<br>";
        echo $q35 = $_POST["q35"]."q35"."<br>";
        echo $q36 = $_POST["q36"]."q36"."<br>";
        echo $feedback = $_POST["feedback"];

        $created_date = date("Y/m/d h:i:s");
       
      try
      {
        $stmt = $conn->prepare("INSERT INTO evaluation (q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, q11, q12, q13, q14, q15, q16, q17, q18, q19, q20, q21, q22, q23, q24, q25, q26 , q27, q28, q29, q30, q31, q32, q33, q34, q35, q36, feedback, user_id, centers_id, customerservices_id, reviewby, created_date ) VALUES (:q1, :q2, :q3, :q4, :q5, :q6, :q7, :q8, :q9, :q10, :q11, :q12, :q13, :q14, :q15, :q16, :q17, :q18, :q19, :q20, :q21, :q22, :q23, :q24, :q25, :q26 , :q27, :q28, :q29, :q30, :q31, :q32, :q33, :q34, :q35, :q36, :feedback, :user_id, :centers_id, :customerservices_id, :reviewby, :created_date)"); 
        
        $stmt->bindParam(':q1', $q1);
        $stmt->bindParam(':q2', $q2);
        $stmt->bindParam(':q3', $q3);
        $stmt->bindParam(':q4', $q4);
        $stmt->bindParam(':q5', $q5);
        $stmt->bindParam(':q6', $q6);
        $stmt->bindParam(':q7', $q7);
        $stmt->bindParam(':q8', $q8);
        $stmt->bindParam(':q9', $q9);
        $stmt->bindParam(':q10', $q10);
        $stmt->bindParam(':q11', $q11);
        $stmt->bindParam(':q12', $q12);
        $stmt->bindParam(':q13', $q13);
        $stmt->bindParam(':q14', $q14);
        $stmt->bindParam(':q15', $q15);
        $stmt->bindParam(':q16', $q16);
        $stmt->bindParam(':q17', $q17);
        $stmt->bindParam(':q18', $q18);
        $stmt->bindParam(':q19', $q19);
        $stmt->bindParam(':q20', $q20);
        $stmt->bindParam(':q21', $q21);
        $stmt->bindParam(':q22', $q22);
        $stmt->bindParam(':q23', $q23);
        $stmt->bindParam(':q24', $q24);
        $stmt->bindParam(':q25', $q25);
        $stmt->bindParam(':q26', $q26);
        $stmt->bindParam(':q27', $q27);
        $stmt->bindParam(':q28', $q28);
        $stmt->bindParam(':q29', $q29);
        $stmt->bindParam(':q30', $q30);
        $stmt->bindParam(':q31', $q31);
        $stmt->bindParam(':q32', $q32);
        $stmt->bindParam(':q33', $q33);
        $stmt->bindParam(':q34', $q34);
        $stmt->bindParam(':q35', $q35);
        $stmt->bindParam(':q36', $q36);
        $stmt->bindParam(':feedback', $feedback);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':centers_id', $centers_id);
        $stmt->bindParam(':customerservices_id', $customerservices_id);
        $stmt->bindParam(':reviewby', $reviewby);
        $stmt->bindParam(':created_date', $created_date);
        
            $stmt->execute();
      } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }
      header('Location: system-evaluation.php');
      exit();
}


?>